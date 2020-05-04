<?php
$this->WIdb->insert('wi_trans', array(
            "lang"     => $code,
            "keyword" => $keyword,
            "trans" => $trans

                )); 

                  $this->WIdb->update(
                    'wi_modules',
                     array(
                         "trans" => $trans
                     ),
                     "`name` = :mod_name",
                     array("mod_name" => $mod_name)
                );

       $result = $this->WIdb->select("SELECT * FROM `wi_trans` WHERE `lang` =:lang AND `keyword`=:keyword AND `translation`=:trans", 
            array(
            "lang" => $code,
            "keyword" => $keyword,
            "trans"  => $trans
            )
        );


        		$result['$column'] = $this->WIdb->selectColumn('SELECT * FROM `wi_site` WHERE `id` = :user_id', 
			array(
				'user_id' => $user_id
				), 
			$column);

		$this->WIdb->delete("wi_members", "user_id = :id", array( "id" => $this->userId ));