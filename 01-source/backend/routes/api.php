<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//需要token验证的接口
Route::group(['prefix'=>'v1',],function(){
    /*
    |-------------------------------------------------------------------------------
    | 测试接口组
    |-------------------------------------------------------------------------------
    */
    Route::prefix('tests')->group(function () {
        /*
        |-------------------------------------------------------------------------------
        | 获取测试信息
        |-------------------------------------------------------------------------------
        | URL:            /api/v1/tests
        | Controller:     
        | Method:         GET
        | Description:    获取测试信息
        */
        Route::get('/','TestsController@tests');
        /*
        |-------------------------------------------------------------------------------
        | 接口制作测试
        |-------------------------------------------------------------------------------
        | URL:            /api/v1/tests/index
        | Controller:     
        | Method:         GET
        | Description:    接口制作测试
        */
        Route::get('/index','TestsController@index');
    });
    /*
    |-------------------------------------------------------------------------------
    | 试卷接口组
    |-------------------------------------------------------------------------------
    */
    Route::prefix('papers')->group(function () {
        /*
        |-------------------------------------------------------------------------------
        | 与试卷相关的接口
        |-------------------------------------------------------------------------------
        | URL:            /api/v1/papers
        | Controller:     
        | Method:         GET
        | Description:    获取试卷详细信息
        */
        Route::get('/','PaperController@paperindex');
         /*
        |-------------------------------------------------------------------------------
        | 与试卷相关的接口
        |-------------------------------------------------------------------------------
        | URL:            /api/v1/papers/subjects
        | Controller:     
        | Method:         GET
        | Description:    获取试卷的习题内容
        */
        Route::get('/subjects','PaperController@papersubjects');
        
    });
    Route::prefix('subjects')->group(function () {
        /*
        |-------------------------------------------------------------------------------
        | 与习题相关的接口
        |-------------------------------------------------------------------------------
        | URL:            /api/v1/subjects/{id}
        | Controller:     
        | Method:         GET
        | Description:    获取习题信息
        */
        Route::get('/{id}','SubjectController@subjectindex');
        
    });
    Route::prefix('paperins')->group(function () {
        /*
        |-------------------------------------------------------------------------------
        | 与试卷内习题相关的接口
        |-------------------------------------------------------------------------------
        | URL:            /api/v1/paperins/{paperid}
        | Controller:     
        | Method:         GET
        | Description:    获取试卷内习题信息
        */
        Route::get('/{id}','PaperinController@paperin');
    });
    Route::prefix('sudjectypes')->group(function () {
        /*
        |-------------------------------------------------------------------------------
        | 习题类型相关的接口
        |-------------------------------------------------------------------------------
        | URL:            /api/v1/sudjectypes/
        | Controller:     
        | Method:         GET
        | Description:    获取习题类型信息
        */
        Route::get('/','SubjectypeController@type');
    });
    Route::prefix('explainations')->group(function () {
        /*
        |-------------------------------------------------------------------------------
        | 习题解析相关的接口
        |-------------------------------------------------------------------------------
        | URL:            /api/v1/explainations/
        | Controller:     
        | Method:         GET
        | Description:    获取习题解析信息
        */
        Route::get('/','ExplainationController@index');
    });

    Route::prefix('scores')->group(function () {
        /*
        |-------------------------------------------------------------------------------
        | 获取测试信息
        |-------------------------------------------------------------------------------
        | URL:            /api/v1/scores
        | Controller:     ScoreController
        | Method:         GET
        | Description:    上传
        */
        Route::get('/','ScoreController@scoreupload');
        /*
        |-------------------------------------------------------------------------------
        | 获取测试信息
        |-------------------------------------------------------------------------------
        | URL:            /api/v1/scores/scorelist
        | Controller:     ScoreController
        | Method:         GET
        | Description:    上传
        */
        Route::get('/scorelist','ScoreController@scorelist');
         /*
        |-------------------------------------------------------------------------------
        | 获取测试信息
        |-------------------------------------------------------------------------------
        | URL:            /api/v1/scores/scoreupload
        | Param:          
        | Controller:     ScoreController
        | Method:         GET
        | Description:    上传本次用户的得分情况
        */
        Route::get('/scorelist','ScoreController@scorelist');
         /*
        |-------------------------------------------------------------------------------
        | 获取测试信息
        |-------------------------------------------------------------------------------
        | URL:            /api/v1/scores/scoreuserlog
        | Param:          
        | Controller:     ScoreController
        | Method:         GET
        | Description:    上传本次用户的得分情况
        */
        Route::get('/scoreuserlog','ScoreController@scoreuserlog');
    });


    Route::prefix('analyses')->group(function () {
        /*
        |-------------------------------------------------------------------------------
        | 获取测试信息
        |-------------------------------------------------------------------------------
        | URL:            /api/v1/analyses
        | Controller:     AnalyseController
        | Method:         GET
        | Description:    获取测试信息
        */
        Route::get('/','AnalyseController@findAnalyse');
        /*
        |-------------------------------------------------------------------------------
        | 获取测试信息
        |-------------------------------------------------------------------------------
        | URL:            /api/v1/analyses/{student_id}
        | Controller:     AnalyseController
        | Method:         GET
        | Description:    获取测试信息
        */
        Route::get('/{stuId}','AnalyseController@findAnalyseBySId');
    });


    Route::prefix('records')->group(function () {
        /*
        |-------------------------------------------------------------------------------
        | 获取测试信息
        |-------------------------------------------------------------------------------
        | URL:            /api/v1/records
        | Controller:     RecordController
        | Method:         GET
        | Description:    获取测试信息
        */
        Route::get('/','RecordController@findRecord');
        /*
        |-------------------------------------------------------------------------------
        | 获取测试信息
        |-------------------------------------------------------------------------------
        | URL:            /api/v1/records/{student_id}
        | Controller:     RecordController
        | Method:         GET
        | Description:    获取测试信息
        */
        Route::get('/{stuId}','RecordController@findRecordBySId');
        /*
        |-------------------------------------------------------------------------------
        | 获取测试信息
        |-------------------------------------------------------------------------------
        | URL:            /api/v1/records/add
        | Param:          {stuId},{recType},{Index},{Correct}
        | Controller:     RecordController
        | Method:         POST
        | Description:    获取测试信息
        */
        Route::post('/add','RecordController@addRecord');
    });
    Route::prefix('collections')->group(function(){
        /*
        |-------------------------------------------------------------------------------
        | 收藏相关接口
        |-------------------------------------------------------------------------------
        | URL:            /api/v1/collections
        | Controller:     
        | Method:         GET
        | Description:    获取收藏信息
        */
        Route::get('/{id}','CollectionController@collectionindex');
    });
    Route::prefix('students')->group(function(){
        /*
        |-------------------------------------------------------------------------------
        | 学生信息相关接口
        |-------------------------------------------------------------------------------
        | URL:            /api/v1/students
        | Controller:     
        | Method:         GET
        | Description:    获取学生信息
        */
        Route::get('/','StudentController@students');
    });
    Route::prefix('student_paper_mns')->group(function(){
        /*
        |-------------------------------------------------------------------------------
        | 收藏相关接口
        |-------------------------------------------------------------------------------
        | URL:            /api/v1/student_paper_mn_index
        | Controller:     
        | Method:         GET
        | Description:    获取收藏信息
        */
        Route::get('/','Student_paper_mnController@student_paper_mn_index');
    });
    Route::prefix('student_collections_mns')->group(function(){
        /*
        |-------------------------------------------------------------------------------
        | 收藏相关接口
        |-------------------------------------------------------------------------------
        | URL:            /api/v1/collections
        | Controller:     
        | Method:         GET
        | Description:    获取收藏信息
        */
        Route::get('/{id}','Student_collections_mnController@student_collections_mn_index');
    });
    Route::prefix('getuser')->group(function(){
        /*
        |-------------------------------------------------------------------------------
        | 收藏相关接口
        |-------------------------------------------------------------------------------
        | URL:            /api/v1/getuser
        | Controller:     
        | Method:         GET
        | Description:    获取收藏信息
        */
        Route::get('/','userController@getuser');
    });


});

Route::group([

    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});