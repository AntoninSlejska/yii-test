<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\models\Room;
use app\models\Reservation;
use app\models\Customer;

/**
 *
 */
class RoomsController extends Controller
{
  public function actionIndex()
  {
    $sql = 'SELECT * FROM room ORDER BY id ASC';

    $db = Yii::$app->db;

    $rooms = $db->createCommand($sql)->queryAll();

    return $this->render('index', ['rooms' => $rooms]);
  }

  public function actionIndexFiltered()
  {
    $query = Room::find();

    $searchFilter = [
      'floor' => ['operator' => '', 'value' => ''],
      'room_number' => ['operator' => '', 'value' => ''],
      'price_per_day' => ['operator' => '', 'value' => ''],
      ];

    if (isset($_POST['SearchFilter'])) {
      $fieldsList = ['floor', 'room_number', 'price_per_day'];

      foreach ($fieldsList as $field) {
        $fieldOperator = $_POST['SearchFilter'][$field]['operator'];
        $fieldValue = $_POST['SearchFilter'][$field]['value'];
        $searchFilter[$field] = ['operator' => $fieldOperator, 'value' => $fieldValue];

        if ($fieldValue != '') {
          $query->andWhere([$fieldOperator, $field, $fieldValue]);
        }
      }
    }

    $rooms = $query->all();

    return $this->render('indexFiltered', ['rooms' => $rooms, 'searchFilter' => $searchFilter]);
  }

  public function actionCreate()
  {
    $model = new Room();

    if ($model->load(Yii::$app->request->post()) && ($model->save())) {
        return $this->redirect(['detail', 'id' => $model->id]);
    }

    // if (isset($POST['Room'])) {
    //     $model->attributes = $_POST['Room'];
    //
    //     if ($model->save()) {
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     }
    // }
    return $this->render('create', ['model' => $model]);
  }

  public function actionUpdate($id)
  {
    $model = Room::findOne($id);

    if ( ($model != null) && ($model->load(Yii::$app->request->post())) && ($model->save())) {
        return $this->redirect(['detail', 'id' => $model->id]);
    }

    return $this->render('update', ['model' => $model]);
  }

  public function actionDetail($id)
  {
    $model = Room::findOne($id);
    return $this->render('detail', ['model' => $model]);
  }

  public function actionLastReservationByRoomId($room_id)
  {
    $room = Room::findOne($room_id);
    $lastReservation = $room->lastReservation;

    return $this->render('lastReservationByRoomId', [
      'room' => $room,
      'lastReservation' => $lastReservation,
    ]);
  }
  public function actionLastReservationForEveryRoom()
  {
    $rooms = Room::find()->with('lastReservation')->all();

    return $this->render('lastReservationForEveryRoom', [
      'rooms' => $rooms,
    ]);
  }
  public function actionIndexWithRelationships()
  {
    $room_id = Yii::$app->request->get('room_id', null);
    $reservation_id =Yii::$app->request->get('reservation_id', null);
    $customer_id =Yii::$app->request->get('customer_id', null);

    $roomSelected = null;
    $reservationSelected = null;
    $customerSelected = null;

    if ($room_id != null) {
      $roomSelected = Room::findOne($room_id);

      $rooms = array($roomSelected);
      $reservations = $roomSelected->reservations;
      $customers = $roomSelected->customers;
    } elseif ($reservation_id != null) {
      $reservationSelected = Reservation::findOne($reservation_id);

      $rooms = array($reservationSelected->room);
      $reservations = array($reservationSelected);
      $customers = array($reservationSelected->customer);
    } elseif ($customer_id != null) {
      $customerSelected = Customer::findOne($customer_id);

      $rooms = $customerSelected->rooms;
      $reservations = $customerSelected->reservations;
      $customers = array($customerSelected);
    } else {
      $rooms = Room::find()->all();
      $reservations = Reservation::find()->all();
      $customers = Customer::find()->all();
    }

    return $this->render('indexWithRelationships', ['roomSelected' => $roomSelected, 'reservationSelected' => $reservationSelected, 'customerSelected' => $customerSelected, 'rooms' => $rooms, 'reservations' => $reservations, 'customers' => $customers]);
  }
}
