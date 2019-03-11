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
			
			$id = $contact->id;
			
			$message = factory(Message::class)->make([
				'from' => $id
			]);
			
			$contact->messages()->save($message);
			
			$sent = factory(Message::class)->make([
				'to' => $id
			]);
			$contact->sent()->save($sent);
		});
    }
}
