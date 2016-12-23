<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

class StaffMailer extends Mailer
{



	// Mes différents courriels 
    public function welcome($staff)
    {
        $this
            ->to($staff->email)
            ->subject(sprintf('Bienvenue %s, active ton compte!', $staff->username))
            ->template('welcome') // By default template with same name as method name is used.
            ->emailFormat('html')    
            ->set(['uuid' => $staff->uuid]);
    }


}
