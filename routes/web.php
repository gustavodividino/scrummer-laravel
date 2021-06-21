<?php


Route::get('/achive/{idProject}', 'AchivementController@finishProjetos');

Route::post('/ajax',      'ProductBacklogController@tasksave');

Route::post('/validarTask',      'ProductBacklogController@validarTask');

Route::post('/team',      'TeamProjectController@teamsave');
Route::post('/dropteam',      'TeamProjectController@dropTeam');
Route::post('/saveskill',      'SkillProfileController@saveskill');
Route::post('/removeskill',      'SkillProfileController@removeskill');

Route::post('/addachivehl',      'AchivementController@addachivehl');


Route::get('/burnup/{id}',      'ProjectController@burnup');
Route::get('/alloc/{id}',      'ProfileController@graphAlloc');

/*
 * Rotas de Help
 */
Route::group(['prefix' => 'help'], function() {
    Route::get('process', 'SiteController@helpProcess');
    Route::get('scrum', 'SiteController@helpScrum');
    Route::get('scrummer', 'SiteController@helpScrummer');
});

/*
 * Rotas de Busca
 * Somente para pessoas autenticadas ('middleware' => 'auth')
 */
Route::group(['prefix' => 'find','middleware' => 'auth'], function() {
    Route::get('user', 'SiteController@findUser');
    Route::get('project', 'SiteController@findProject');
});

/*
 * Rotas de Perfil
 * Somente para pessoas autenticadas ('middleware' => 'auth')
 */
Route::group(['prefix' => 'profile', 'middleware' => 'auth'], function() {
    
    Route::post('find',                             'ProfileController@findByID');
    Route::get('{profile}',                         'ProfileController@show');
    Route::post('{profile}/update',                             'ProfileController@update');
    Route::post('create',                           'ProfileController@newProfile');    
    Route::get('uploadPhoto',                       'ProfileController@changePhoto'); 
    Route::post('uploadPhoto',                      'ProfileController@changePhoto'); 
    
    Route::get('{profile}/skillproject',             'SkillProfileController@manageSkillProfile');
    Route::get('{profile}/getSkillProject',          'SkillProfileController@findByProfile');    
        
    //Route::get('{idUser}',                  'ProfileController@indexPage');
    Route::get('{profile}/info',             'ProfileController@infoPage');
    Route::get('{profile}/achivement',       'ProfileController@achivementPage');
    Route::get('{profile}/skill',            'ProfileController@skillPage');
    Route::get('{profile}/feed',             'ProfileController@feedPage');
    Route::get('{profile}/project',          'ProfileController@projectPage');
    Route::get('{profile}/allocation',       'ProfileController@allocPage');  
    Route::post('{profile}/save',            'ProfileController@store');

    Route::post('result',                 'ProfileController@result'); 
    
});

/*
 * Rotas do Projeto
 * Somente para pessoas autenticadas ('middleware' => 'auth')
 */
Route::group(['prefix' => 'project', 'middleware' => 'auth'], function() {
    
    Route::get('find',                             'ProjectController@show');    
    Route::post('save',                             'ProjectController@save');
    Route::post('{project}/update',                 'ProjectController@update');
    Route::get('create',                           'ProjectController@newProject');
    Route::get('{project}',                         'ProjectController@show');
    
    //Route::get('/add/teamproject',                  'TeamProjectController@addUser');
    Route::get('{project}/teamproject',             'TeamProjectController@manageTeamProject');
    Route::get('{project}/getTeamProject',          'TeamProjectController@findByProject');
    Route::get('{project}/teamproject/save',          'TeamProjectController@teste');
    
    Route::get('{project}/edit',                  'ProjectController@editPage');
    Route::get('{project}/attach',                'ProjectController@attachPage');
    Route::get('{project}/taskboard',             'ProjectController@dashboardPage');  
    Route::get('{project}/daily',                 'ProjectController@dailyPage'); 
    Route::get('{project}/status',                 'ProjectController@statusPage'); 
    Route::post('{project}/done',                 'ProjectController@doneProject'); 

    Route::post('result',                 'ProjectController@result'); 

    Route::get('{project}/upload',                           'AttachController@upload');
    Route::post('{project}/move',                   'AttachController@move');

    Route::get('sprint/{idSprint}',                 'SprintController@show');
    Route::get('productbacklog/{idproductbacklog}', 'ProductBacklogController@show');

    /* ROTAS ANTIGAS - APAGAR DEPOIS*/
    Route::post('updatetask/',           'ProjectController@tasksave');



     
    
});

Route::group(['prefix' => 'teamproject', 'middleware' => 'auth'], function() {
    Route::post('save',                 'TeamProjectController@teste');

});


/*
 * Rotas do Sprint
 * Somente para pessoas autenticadas ('middleware' => 'auth')
 */
Route::group(['prefix' => 'sprint', 'middleware' => 'auth'], function() {
    Route::post('find',                             'SprintController@findByID');
    //Route::get('{sprint}',                          'SprintController@show');
    Route::post('save',                             'SprintController@save');
    Route::post('update',                             'SprintController@update');
    Route::get('create',                           'SprintController@newSprint'); 
    Route::get('{idSprint}/edit',                   'SprintController@editSprint');   
});

/*
 * Rotas do ProductBacklog
 * Somente para pessoas autenticadas ('middleware' => 'auth')
 */
Route::group(['prefix' => 'productbacklog', 'middleware' => 'auth'], function() {
    Route::post('/find',                             'ProductBacklogController@findByID');
    Route::post('/save',                             'ProductBacklogController@save');
    Route::post('/update',                             'ProductBacklogController@update');
    Route::get('/cancel/{idProduct}',                             'ProductBacklogController@cancel');
    Route::get('create',                            'ProductBacklogController@newProductbacklog');
    Route::get('getProducts/{idProject}',           'ProductBacklogController@findByProject');
    Route::get('getProductsSprints/{idProject}',           'ProductBacklogController@findBySprint');
    Route::get('getProductTeam/{idProduct}',           'ProductBacklogController@getTeamProduct');
    Route::get('{idProductbacklog}/edit',                   'ProductBacklogController@editProductbacklog');   
    
});








/*
 *  ROTAS da Administração do Sistema
 *  Somente para pessoas autenticadas ('middleware' => 'auth')
 */

/*
 * Rotas do Achivement
 * Somente para pessoas autenticadas ('middleware' => 'auth')
 */
Route::group(['prefix' => 'achivement', 'middleware' => 'auth'], function() {
    Route::post('find',                             'AchivementController@findByID');
    Route::get('{achivement}',                  'AchivementController@show');
    Route::post('save',                             'AchivementController@store');
    Route::post('create',                           'AchivementController@newAchivement');
    
});

/*
 * Rotas do Attach
 * Somente para pessoas autenticadas ('middleware' => 'auth')
 */
Route::group(['prefix' => 'attach', 'middleware' => 'auth'], function() {
    Route::post('find',                             'AttachController@findByID');
    Route::get('{attach}',                          'AttachController@show');
    Route::post('save',                             'AttachController@store');
    Route::post('create',                           'AttachController@newAttach');
    
});

/*
 * Rotas do Daily
 * Somente para pessoas autenticadas ('middleware' => 'auth')
 */
Route::group(['prefix' => 'daily', 'middleware' => 'auth'], function() {
    Route::post('find',                             'DailyController@findByID');
    Route::get('{daily}',                           'DailyController@show');
    Route::post('save',                             'DailyController@store');
    Route::post('create',                           'DailyController@newDaily');
    
});

/*
 * Rotas do Level
 * Somente para pessoas autenticadas ('middleware' => 'auth')
 */
Route::group(['prefix' => 'level', 'middleware' => 'auth'], function() {
    Route::post('find',                             'LevelController@findByID');
    Route::get('{level}',                           'LevelController@show');
    Route::post('save',                             'LevelController@store');
    Route::post('create',                           'LevelController@newLevel');
    
});

/*
 * Rotas do Position
 * Somente para pessoas autenticadas ('middleware' => 'auth')
 */
Route::group(['prefix' => 'position', 'middleware' => 'auth'], function() {
    Route::post('find',                             'PositionController@findByID');
    //Route::get('{position}',                        'PositionController@show');
    Route::post('save',                             'PositionController@store');
    Route::post('create',                           'PositionController@newPosition');
    Route::get('getPosition',                       'PositionController@getPosition');
    
});

/*
 * Rotas do Rank
 * Somente para pessoas autenticadas ('middleware' => 'auth')
 */
Route::group(['prefix' => 'rank', 'middleware' => 'auth'], function() {
    Route::post('find',                             'RankController@findByID');
    Route::get('{rank}',                            'RankController@show');
    Route::post('save',                             'RankController@store');
    Route::post('create',                           'RankController@newRank');
    
});

/*
 * Rotas do Skill
 * Somente para pessoas autenticadas ('middleware' => 'auth')
 */
Route::group(['prefix' => 'skill', 'middleware' => 'auth'], function() {
    Route::post('find',                             'SkillController@findByID');
    Route::get('{skill}',                           'SkillController@show');
    Route::post('save',                             'SkillController@store');
    Route::post('create',                           'SkillController@newSkill');
    
});

/*
 * Rotas do Status
 * Somente para pessoas autenticadas ('middleware' => 'auth')
 */
Route::group(['prefix' => 'status', 'middleware' => 'auth'], function() {
    Route::post('find',                             'StatusController@findByID');
    Route::get('{status}',                          'StatusController@show');
    Route::post('save',                             'StatusController@store');
    Route::post('create',                           'StatusController@newStatus');
    
});

/*
 * Rotas do Taskboard
 * Somente para pessoas autenticadas ('middleware' => 'auth')
 */
Route::group(['prefix' => 'taskboard', 'middleware' => 'auth'], function() {
    Route::post('find',                             'TaskBoardController@findByID');
    Route::get('{taskboard}',                       'TaskBoardController@show');
    Route::post('save',                             'TaskBoardController@store');
    Route::post('create',                           'TaskBoardController@newTaskBoard');
    
});

/*
 * Rotas default
 */
Route::get('/',         'SiteController@login');
Route::get('/contato',  'SiteController@contato');
Route::get('login',    'SiteController@login');
Route::get('logout',    'SiteController@login');

Auth::routes();
Route::get('/home',     'HomeController@index');
Route::get('/administrador', 'AdministracaoController@index');
    