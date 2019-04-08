<?php

namespace App\Console\Commands;
use App\Facility;
use App\Contract;
use App\User;
use App\Property;
use Illuminate\Console\Command;

class InitDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'init:database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize database';
    
    //init users
    private $users_data = [
        [
            'name' => 'David Beckham',
            'email' => 'david@gmail.com',
            'password' => 'david',
            'user_type' => 'tenant'
        ],
        [
            'name' => 'Reborn James',
            'email' => 'reborn@gmail.com',
            'password' => 'reborn',
            'user_type' => 'tenant'
        ],
        [
            'name' => 'Kobe Bryan',
            'email' => 'kobe@gmail.com',
            'password' => 'kobe',
            'user_type' => 'owner'
        ],
        [
            'name' => 'Kevin Durant',
            'email' => 'kevin@gmail.com',
            'password' => 'kevin',
            'user_type' => 'owner'
        ]
    ];

    //init facilities
    private $facilities_data = [
        [
            'name' => 'chair',
            'description' => 'made by high quality iron'
        ],
        [
            'name' => 'table',
            'description' => 'made by high quality wood'
        ],
        [
            'name' => 'wardrobe',
            'description' => 'made by high quality wood'
        ],
    ];

    //init properties
    private $properties_data = [
        [
            'owner_id' => 3,
            'property_type' => 'room',
            'price' => 500,
            'square_feet' => '300',
            'status' => 'rent',
            'address' => 'A5-G-2, Jalan Sungai Long, Kajang, 43000, Selangor'
        ],
        [
            'owner_id' => 3,
            'property_type' => 'unit',
            'price' => 2000,
            'square_feet' => '1350',
            'status' => 'available',
            'address' => 'B1-5-2, Jalan Sungai Long, Kajang, 43000, Selangor'
        ],
        [
            'owner_id' => 4,
            'property_type' => 'room',
            'price' => 600,
            'square_feet' => '250',
            'status' => 'available',
            'address' => 'A6-7-2, Jalan Sungai Long, Kajang, 43000, Selangor'
        ],
    ];

    //contracts
    private $contracts_data = [
        [
            'property_id' => 1,
            'tenant_id' => 1,
            'description' => 'This contract will need to pay 2 month deposit',
            'start_date' => '2019-04-01',
            'end_date' => '2019-12-01'
        ]
    ];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        foreach($this->users_data as $user_data) {
            $user = new User;
            $user->name = $user_data['name'];
            $user->email = $user_data['email'];
            $user->password = bcrypt($user_data['password']);
            $user->user_type = $user_data['user_type'];
            $user->save();

            echo "User $user->email created successfully\n";
        }

        foreach($this->facilities_data as $facility_data) {
            $facility = new Facility;
            $facility->name = $facility_data['name'];
            $facility->description = $facility_data['description'];
            $facility->save();

            echo "Facility $facility->name created successfully\n";
        }

        foreach($this->properties_data as $property_data) {
            $property = new Property;
            $property->owner_id = $property_data['owner_id'];
            $property->property_type = $property_data['property_type'];
            $property->price = $property_data['price'];
            $property->square_feet = $property_data['square_feet'];
            $property->status = $property_data['status'];
            $property->address = $property_data['address'];
            $property->save();

            echo "Property Owner $property->owner_id created successfully\n";
        }

        
        foreach($this->contracts_data as $contract_data) {
            $contract = new contract;
            $contract->property_id = $contract_data['property_id'];
            $contract->tenant_id = $contract_data['tenant_id'];
            $contract->description = $contract_data['description'];
            $contract->start_date = $contract_data['start_date'];
            $contract->end_date = $contract_data['end_date'];
            $contract->save();

            echo "Contract $contract->start_date to $contract->end_date created successfully\n";
        }
    }
}
