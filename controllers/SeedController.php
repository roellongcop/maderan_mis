<?php

namespace app\controllers;

use Yii;
use app\models\Block;
use app\models\Lot;
use app\models\Street;
use app\models\Place;
use app\models\History;
use app\models\Achievement;
use app\models\People;
use app\models\Blotter;
use app\models\NatureOfCases;
use app\models\Respondent;
use app\models\Complainant;
use app\models\Messages;

use yii\web\Controller;

/**
 * AboutController implements the CRUD actions for About model.
 */
class SeedController extends Controller
{
    public $description = [
        'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua.', 
        'Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat.', 
        'Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
    ];

    public $street = [
        'Rizal', 'Apolinario', 'Lapu Lapu', 'Aguinaldo', 'Juan Luna', 'Governors Drive',
        'Maharlika', 'Mabini', 'Roxas',
    ];

    public $status = 'active';

    public $places = ['BasketBall Court', 'Botanical Garden', 'Brgy Stadium', 'Clinic Room', 'Conference Room', 'Players Floor', 'RestBar Arena'];
    public $sex = ['male', 'female'];
    public $birthPlace = ['Luzon', 'Visayas', 'Mindanao'];
    public $relationship = [
        'spouse', 'mother', 'father',
        'brother', 'sister', 'neighbor',
        'friend',
    ];

    public $civil_status = [
        'single', 'married', 'widowed', 'engage'
    ];

    public $family_position = [
        'child', 'parent', 
    ];

    public function getFamilyPosition()
    {
        return $this->family_position[rand(0, (count($this->family_position) - 1))];
    }

    public function getCivilStatus()
    {
        return $this->civil_status[rand(0, (count($this->civil_status) - 1))];
    }


    public function getRelationsip()
    {
        return $this->relationship[rand(0, (count($this->relationship) - 1))];
    }

    
    public function getBirthPlace()
    {
        return $this->birthPlace[rand(0, (count($this->birthPlace) - 1))];
    }

    public function getSex()
    {
        return $this->sex[rand(0, (count($this->sex) - 1))];
    }
    public function getPlace()
    {
        return $this->places[rand(0, (count($this->places) - 1))];
    }


    public function getDescription()
    {
        return $this->description[rand(0, (count($this->description) - 1))];
    }

    public function getStreetName()
    {
        return $this->street[rand(0, (count($this->street) - 1))] . ' Street';
    }


    public function actionBlock($range=10)
    {
        Block::deleteAll();
        Lot::deleteAll();
        Street::deleteAll();
        Place::deleteAll();

        for ($i=0; $i < $range; $i++) { 
            $model = new Block();
            $model->blk_no = (string)($i + 1);
            $model->description = $this->getDescription();
            $model->status = $this->status;
            if ($model->save()) {
                $this->actionLot($model->id);
                $this->actionStreet($model->id);
            }
        }

    }

    public function actionStreet($block_id='', $range = 10)
    {
        for ($x=0; $x < $range; $x++) { 
            $model = new Street();
            $model->block_id = $block_id;
            $model->name = $this->getStreetName() . ' - Road: ' . $this->string(5);
            $model->description = $this->getDescription();
            $model->status = $this->status;
            $model->save();
        }
    }

    public function actionLot($block_id='', $range = 10)
    {
        for ($y=0; $y < $range; $y++) { 
            $model = new Lot();
            $model->block_id = $block_id;
            $model->lot_no = (string)($y + 1);
            $model->description = $this->getDescription();
            $model->status = $this->status;
            $model->save();
        }
    }

    public function string($range=10)
    {
        return Yii::$app->security->generateRandomString($range);
    }

    public function actionPlace($range=10)
    {
        Place::deleteAll();
        
        for ($i=0; $i < $range; $i++) { 
            $model = new Place();
            $model->name = $this->getPlace() . ' - ' . $this->string();
            $model->description = $this->getDescription();
            $model->blk_id = $this->getBlock()->id;
            $model->lot_id = $this->getLot($model->blk_id)->id;
            $model->street_id = $this->getStreet($model->blk_id)->id;
            $model->is_rentable = rand(0, 1);
            $model->rent_price = ($model->is_rentable) ? rand(111, 9999): 0;
            $model->status = $this->status;
            $model->save();
        }
    }

    public function getStreet($block_id)
    {
        $models = Street::findAll(['status' => 'active', 'block_id' => $block_id]);

        return $models[rand(0, (count($models) - 1))];
    }


    public function getLot($block_id)
    {
        $models = Lot::findAll(['status' => 'active', 'block_id' => $block_id]);

        return $models[rand(0, (count($models) - 1))];
    }

    public function getBlock()
    {
        $models = Block::findAll(['status' => 'active']);

        return $models[rand(0, (count($models) - 1))];
    }

    public function actionHistory($range = 10)
    {
        History::deleteAll();
        for ($y=0; $y < $range; $y++) { 
            $model = new History();
            $model->name = 'Title - ' . $this->string(10) ;
            $model->description = $this->getDescription();
            $model->status = $this->status;
            $model->save();
        }
    }

    public function actionAchievement($range = 10)
    {
        Achievement::deleteAll();
        for ($y=0; $y < $range; $y++) { 
            $model = new Achievement();
            $model->name = 'Title - ' . $this->string(10) ;
            $model->description = $this->getDescription();
            $model->status = $this->status;
            $model->save();
        }
    }

    public function getDate($value='')
    {
        return date('Y-m-d', strtotime(rand(1990, 2000) .'-' . rand(1, 12) . '-' . rand(0, 29)));
    }



    public function actionPeople($range = 500)
    {
        $m = [
            'a', 'b','c','d','e','f','g','h','i','j',
            'k', 'l','m','n','o','p','q','r','s','s',
            'u', 'v', 'w', 'x', 'y', 'z'
        ];

        People::deleteAll();
        for ($y=0; $y < $range; $y++) { 
            $message = Messages::findOne(($y + 1));
            if ($message) {
                # code...
            $model = new People(); 
            $date_of_birth = date('Y-m-d', strtotime(rand(1990, 2000) .'-' . rand(1, 12) . '-' . rand(0, 29)));
            $today = new \DateTime();
            $diff = $today->diff(new \DateTime($date_of_birth));
            
            $explode = explode(' ', $message->name);
            $model->fname = isset($explode[0]) ? $explode[0]: 'Not set';
            $model->mname = $m[rand(0, count($m) - 1)] .'.';
            $model->lname = isset($explode[1]) ? $explode[1]: 'Not set';
            $model->age = $diff->y;
            $model->sex = $this->getSex();
            $model->mobile_no = (string)rand(111111111, 999999999);
            $model->tel_no = (string)rand(111111111, 999999999);
            $model->email = $model->fname . '@gmail.com';
            $model->blk_id = $this->getBlock()->id;
            $model->lot_id = $this->getLot($model->blk_id)->id;
            $model->street_id = $this->getStreet($model->blk_id)->id;
            $model->position_id = 0;
            $model->date_of_birth = $date_of_birth;
            $model->place_of_birth = $this->getBirthPlace();
            $model->sss = (string)rand(111111111, 999999999);
            $model->tin = (string)rand(111111111, 999999999);
            $model->contact_person = $this->getName()->name;
            $model->contact_no = (string)rand(111111111, 999999999);
            $model->relationship = $this->getRelationsip();
            $model->photo = 'resources/src/uploads/profile_small.png';
            $model->is_resident = rand(0, 1);
            $model->status = $this->status;
            $model->civil_status = $this->getCivilStatus();
            $model->height = (string)rand(100, 150);
            $model->weight = (string)rand(40, 80);
            $model->length_of_stay = rand(1, $diff->y);
            $model->income = rand(11111, 99999);
            $model->employment_id = 0;
            $model->spouse_id = 0;
            // $model->spouse_id = $this->getSpouse()->id;
            $model->parent_id = 0;
            $model->family_position = $this->getFamilyPosition();
            $model->save();
            }

        }
    }

    public function getName()
    {
        $models = Messages::find()->all();

        return $models[rand(0, (count($models) - 1))];
    }

    public function actionSetSpouse($range=300)
    {
        for ($i=0; $i < $range; $i++) { 
            $model = $this->getSpouse();
            $model->spouse_id = $this->getSpouse()->id;
            $model->save();
        }
    }

    public function getSpouse()
    {
        $models = People::findAll(['status' => 'active']);

        return $models[rand(0, (count($models) - 1))];
    }

    public function actionBlotter($range = 50)
    {
        Blotter::deleteAll();
        Complainant::deleteAll();
        Respondent::deleteAll();
        for ($i=0; $i < $range; $i++) { 
            $model = new Blotter();
            $model->case_no = $this->createCaseNo();
            $model->description = $this->getDescription();
            $model->nature_of_case = $this->getNatureOfCases()->id;
            $model->action_taken = rand(1, 5);
            $model->remarks = rand(1, 5);
            $model->in_charge = Yii::$app->user->identity->id;
            $model->date_happen = $this->getDate();
            $model->time_happen = date('H:i:s', strtotime(rand(1, 23) . ':' . rand(11, 59) . ':' . rand(11, 59)));
            $model->status = 0;
            if ($model->save()) {
                $this->actionComplainant($model->id, rand(1, 3));
                $this->actionRespondent($model->id, rand(1, 3));
            }
        }

    }

    public function actionRespondent($blotter_id, $range)
    {
        for ($i=0; $i < $range; $i++) { 
            $model = new Respondent();
            $model->user_id = $this->getSpouse()->id;
            $model->blotter_id = $blotter_id;
            $model->status = '0';
            $model->address = $this->getDescription();
            $model->save();
        }
    }

    public function actionComplainant($blotter_id, $range = 3)
    {
        for ($i=0; $i < $range; $i++) { 
            $model = new Complainant();
            $model->user_id = $this->getSpouse()->id;
            $model->blotter_id = $blotter_id;
            $model->status = '0';
            $model->address = $this->getDescription();
            $model->save();
        }
    }

    public function getNatureOfCases()
    {
        $models = NatureOfCases::findAll(['status' => 1]);

        return $models[rand(0, (count($models) - 1))];
    }

    protected function createCaseNo()
    {
        $total = count(Blotter::findAll(['status' => 0]));
        $res = [
            'C01',
            str_pad($total + 1, 3, '0', STR_PAD_LEFT),
            substr(date('Y'), 2)
        ];

        return implode("-", $res);
    }
   
}
