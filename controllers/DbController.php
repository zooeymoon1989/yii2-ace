<?php

namespace app\controllers;

use app\models\Actor;
use Yii;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\Controller;

class DbController extends Controller
{

    public function actionAr()
    {
        $records = Actor::find()->joinWith('films')->orderBy('actor.first_name,actor.last_name,film.title')->all();

        return $this->renderRecords($records);
    }


    public function actionQuery()
    {
        $rows = (new Query())
            ->from('actor')
            ->innerJoin('film_actor','actor.actor_id = film_actor.actor_id')
            ->leftJoin('film','film.film_id = film_actor.film_id')
            ->orderBy('actor.first_name ,actor.last_name , actor.actor_id , film.title')
            ->all();

        return $this->renderRows($rows);
    }

    public function actionSql()
    {
        $sql = 'SELECT *
                FROM actor a
                JOIN film_actor fa ON fa.actor_id = a.actor_id
                JOIN film f ON fa.film_id = f.film_id
                ORDER BY a.first_name, a.last_name, a.actor_id,
                f.title';

        $rows = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->renderRows($rows);
    }


    protected function renderRecords(array $records = [])
    {
        if(!$records){
            return $this->renderContent('Actor list is empty');
        }

        $items = [];

        foreach ($records as $record){
            $actorFilms = $record->films?Html::ol(ArrayHelper::getColumn($record->films,'title')):null;

            $actorName = $record->first_name.' '.$record->last_name;

            $items[] = $actorName.$actorFilms;
        }


        return $this->renderContent(Html::ol($items,['encode'=>false]));
    }


    protected function renderRows(array $rows = [])
    {
        if (!$rows) {
            return $this->renderContent('Actor list is empty.');
        }

        $items = [];
        $films = [];

        $actorId = null;
        $actorName = null;
        $actorFilms = null;

        $lastActorId = $rows[0]['actor_id'];

        foreach ($rows as $row){

            $actorId = $row['actor_id'];
            $films[] = $row['title'];

            if($actorId != $lastActorId){
                $actorName = $row['first_name'].' '.$row['last_name'];
                $actorFilms = $films ? Html::ol($films) : null;
                $items[] = $actorName.$actorFilms;
                $films = [];
                $lastActorId = $actorId;
            }

        }

        if ($actorId == $lastActorId) {
            $actorFilms = $films ? Html::ol($films) : null;
            $items[] = $actorName.$actorFilms;
        }
        return $this->renderContent(Html::ol($items, [
            'encode' => false,
        ]));
    }

}
