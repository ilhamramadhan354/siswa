<?php

namespace app\models;

use Yii;



class Murid extends Controller{
	public static function tablename()
	{
		return 'murid';

	}
	public function rules()
	{
		return [
			[['nisn','nama','tempat_lahir','tgl_lahir'], 'required'],
			[['nama'], 'string', 'max' => ],
			[['nisn'], 'string'],
			[['nisn'], 'string'],
			[['nisn'], 'string'],



		]


	}
public function attributesLabel()

	{
		return [
		'nisn' => 'NISN',
		'nama' => 'NISN',
		'nisn' => 'NISN',
		'nisn' => 'NISN',

		

		




		]

	}


}