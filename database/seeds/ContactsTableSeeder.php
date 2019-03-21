<?php

use App\Contact;
use App\Message;
use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		factory(Contact::class, 100)->create()->each(function($contact){			
			$message = factory(Message::class)->make([
				'from' => $contact->number
			]);
			
			$contact->messages()->save($message);
			
			$sent = factory(Message::class)->make([
				'to' => $contact->number
			]);
			$contact->sent()->save($sent);
		});
    }
}
