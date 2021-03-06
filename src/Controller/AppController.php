<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\I18n;
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
                    'authorize' => ['Controller'], // Ajout de cette ligne
                    'authenticate' => [
                        'Form' => [
                            'fields' => [
                                'username' => 'username',
                                'password' => 'password'
                            ],'userModel' => 'Staffs'
                        ]
                    ],
                    'loginAction' => [
                        'controller' => 'Staffs',
                        'action' => 'login'
                    ],
                     'unauthorizedRedirect' => $this->referer()
                ]);

        // Autorise l'action display pour que notre controller de pages
        // continue de fonctionner.
        $this->Auth->allow(['display', 'changeLang', 'view', 'index', 'edit', 'confirm']);
        I18n::Locale($this->request->session()->read('Config.language'));
    }



    public function changeLang($lang = 'en_US') {
        $this->request->session()->write('Config.language', $lang);
        return $this->redirect($this->request->referer());
    }



    public function beforeFilter(Event $event)
    {
        $lang = $this->request->session()->read('Config.language');
        if (empty($lang)) {
            return;
        }

        I18n::locale($lang);
    }

   public function isAuthorized($user)
{
    // Admin peuvent accéder à chaque action
    if (isset($user['role']) && $user['role'] === 'gestionnaire') {
        return true;
    }
    $this->Flash->error(__("You are not autorized to do this action."));
    // Par défaut refuser
    return false;
}

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }

            $this->viewBuilder()->theme('');
    }
}
