<?php
class Model_Recruitjoin extends MyModel
{
    // テーブル情報を設定
  protected static $_table_name = 'recruit_join';
  protected static $_properties = array(
    'id',
    'recruit_id',
    'user_id',
  );
    protected static $primary_key = array('id');
    
      /**
   * @brif    募集に参加情報を追加
   * @access  public
   * @return
   */
  public static function insert($recruit_id){
    $user_id = Auth::get('id');
    $query =  DB::insert('recruit_join')->set(array(
     'recruit_id'  => $recruit_id,
     'user_id' => Auth::get('id'),
    ))->execute();}


  /**
   * @brif    募集に参加しているか判定
   * @access  public
   * @return　int型
   */
  public static function check($recruit_id){
      $user_id = Auth::get('id');
      $query   = DB::select('*')
                  ->from('recruit_join')
                  ->where('recruit_id','=',$recruit_id) 
                  ->and_where('user_id','=',$user_id)
                  ->execute();
      return count($query);
  }
  
     /**
   * @brif    募集への参加情報を削除
   * @access  public
   * @return　
   */
  public static function deleterecruit($recruit_id){
       $user_id = Auth::get('id');
       $query   = DB::delete('recruit_join')
                  ->where('recruit_id',$recruit_id) 
          //        ->and_where('user_id',$user_id)
                  ->execute();
  }
  
    /**
   * @brif    募集に参加している人数をカウント
   * @access  public
   * @return　int型
   */
  public static function countEmty($recruit_id){
     $query   = DB::select('*')
                  ->from('recruit_join')
                  ->where('recruit_id','=',$recruit_id) 
                  ->execute();
      return count($query);
  }
  
  
  
     /**
   * @brif    募集に参加している全ての人数をカウント
   * @access  public
   * @return　int型
   */
  public static function AllcountEmty(){
     $user_id = Auth::get('id');
  
    // $query   = DB::select('*')
    //               ->from('recruit_join')
    //               ->where('recruit_id','in',array(
    //                     ->select('id')
    //                     ->from('recruit')
    //                     ->where('user_id','=',$user_id)
    //                     )
   $query = DB::query('select * 
                      from recruit_join
                      where recruit_id in
                        (select id
                         from recruit
                         where user_id = '.$user_id.')')
                         ->execute();
                         
                      
                        
                       
             
      return count($query);
  }
}
?>
