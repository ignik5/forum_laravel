<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Storage;
use App\dia;
use App\message;

class Temacontroller extends Controller
{
    public function index(){
        $dia = dia::query()
        ->paginate(5);
return view('admin.index',['dia'=>$dia]);
    }
    public function create(dia $dia){
        return view('admin.createtema',[
        'dia'=>$dia,

        ]);
    }

    public function edit(request $request, $id){
        $dia= dia::find($id);
    return view('admin.createtema', [
        'dia'=>$dia,"id"=>$id
    ]);

    }
    public function destroy($id){


        
            dia::find($id)->delete();
            return redirect()->route('admin.dia.index')
                            ->with('success','тема успешно удалена');
        }



    public function update(request $request, dia $dia,$id){
       
        $s=$request->only("tema");
        $dia->tema =$request->only("tema");

      
        $s=$s["tema"];
     
        $s = (string) $s; // преобразуем в строковое значение
  $s = strip_tags($s); // убираем HTML-теги
  $s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
  $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
  $s = trim($s); // убираем пробелы в начале и конце строки
  $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
  $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
  $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
  $dia->name = str_replace(" ", "-", $s); // заменяем пробелы знаком минус


   
            $result = DB::table('dias')
            ->where('id', $id)
            ->update($request->only('tema'),$dia->name);


        if($result){
        return redirect()->route('admin.dia.index')->with('success', 'Новость успешно изменена');
        }
        else{
            $request->flash();
            return redirect()->route('admin.dia.create')->with('error', 'Ошибка добавления новости');
        

        }
    
    
    }

    
    public function store(Request $request){
        $dia = new dia();

        $s=$request->only("tema");
        $dia->tema =$request->only("tema");
        $s=$s["tema"];
     
        $s = (string) $s; // преобразуем в строковое значение
  $s = strip_tags($s); // убираем HTML-теги
  $s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
  $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
  $s = trim($s); // убираем пробелы в начале и конце строки
  $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
  $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
  $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
  $dia->name = str_replace(" ", "-", $s); // заменяем пробелы знаком минус


   
            $result = $dia -> fill($request->only('tema'),$dia->name)->save();
         

      
            if($result){
                return redirect()->route('admin.dia.index')->with('success', 'Новость успешно изменена');
                }
                else{
                    $request->flash();
                    return redirect()->route('admin.dia.create')->with('error', 'Ошибка добавления новости');
                
        
                }
         
         
        
        //DB::table('news')->insert($data);
 
 
     
        
     
      
         
 
 
         
     }
}
