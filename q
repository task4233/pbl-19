diff --cc app/Http/Controllers/LeaveController.php
index a79ba70,b44ef33..0000000
--- a/app/Http/Controllers/LeaveController.php
+++ b/app/Http/Controllers/LeaveController.php
@@@ -67,6 -67,10 +67,13 @@@ class LeaveController extends Controlle
              }
              
              return view('leave', ['reason_types' => $arr]);
++<<<<<<< HEAD
++=======
+             break;
+         case "position":
+             $positions = Position::getPositions();
+             return view('position', ['positions' => $positions]);
++>>>>>>> a2658129e3548b3af35e38dbff84fbd580950d50
              break;
          case "distance":
              return view('distance');// Still Making...
diff --cc app/Models/Position.php
index 96ee2ef,efce2f7..0000000
--- a/app/Models/Position.php
+++ b/app/Models/Position.php
@@@ -3,14 -3,21 +3,34 @@@
  namespace App\Models;
  
  use Illuminate\Database\Eloquent\Model;
++<<<<<<< HEAD
 +
 +class Position extends Model
 +{
 +    //
 +    $positions = DB::table('leaves')
 +               ->select(DB::raw('count(*) as position_cnt, position'))
 +               ->whreNotNull('position')
 +               ->groupBy('position')
 +               ->get();
 +    return $positions;
++=======
+ use DB;
+ 
+ class Position extends Model
+ {
+     protected $table = 'positions';
+     protected $fillable = [];
+ 
+     public static function getPositions(){
+         $positions = DB::table('leaves')
+                    ->select(DB::raw('count(*) as position_cnt, position'))
+                    ->whereNotNull('position')
+                    ->whereRaw('position != ""')
+                    ->groupBy('position')
+                    ->get();
+         return $positions;
+     }
+     
++>>>>>>> a2658129e3548b3af35e38dbff84fbd580950d50
  }
diff --cc resources/views/leave.blade.php
index 566c3c1,f64ffa0..0000000
--- a/resources/views/leave.blade.php
+++ b/resources/views/leave.blade.php
@@@ -17,7 -17,7 +17,11 @@@
  		ctx.style.height = 750;
  		var pieCanvas = new Chart(ctx, {
      // kind of graph
++<<<<<<< HEAD
 +    type: 'doughnut',
++=======
+     type: 'pie',
++>>>>>>> a2658129e3548b3af35e38dbff84fbd580950d50
      // data setting
      data: {
        // labels
