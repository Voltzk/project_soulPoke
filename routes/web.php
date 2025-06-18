<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZnoteNewsController;
use App\Http\Controllers\ZnoteAccountsController;
use App\Http\Controllers\ZnoteShopOrdersController;
use App\Http\Controllers\ZnoteShopLogsController;
use App\Http\Controllers\ZnoteForumController;
use App\Http\Controllers\ZnoteForumThreadsController;
use App\Http\Controllers\ZnoteForumPostsController;
use App\Http\Controllers\ZnoteTicketsController;
use App\Http\Controllers\ZnoteTicketsRepliesController;
use App\Http\Controllers\ZnotePlayersController;
use App\Http\Controllers\ZnoteDeletedCharactersController;
use App\Http\Controllers\ZnoteImagesController;
use App\Http\Controllers\ZnotePagseguroController;
use App\Http\Controllers\ZnotePaygolController;
use App\Http\Controllers\ZnotePaypalController;
use App\Http\Controllers\ZnoteChangelogController;
use App\Http\Controllers\ZnoteGlobalStorageController;
use App\Http\Controllers\ZnoteGuildWarsController;
use App\Http\Controllers\ZnotePlayerReportsController;
use App\Http\Controllers\ZnoteVisitorsDetailsController;
use App\Http\Controllers\ZnotePagseguroNotificationsController;
use App\Http\Controllers\ZnoteVisitorsController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\GuildController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\GuildWarKillController;
use App\Http\Controllers\GuildRankController;
use App\Http\Controllers\GuildMembershipController;
use App\Http\Controllers\GuildInviteController;
use App\Http\Controllers\HouseListController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AccountBanHistoryController;
use App\Http\Controllers\PlayerDeathsController;
use App\Http\Controllers\PlayerItemsController;
use App\Http\Controllers\MarketOffersController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ServerInfoController;
use App\Models\Player;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\CharacterProfileController;

Route::get('/', [HomeController::class, 'index']);

// Modern RESTful API endpoints (prefix: /api/v1)
Route::prefix('api/v1')->group(function () {
    // Znote AAC
    Route::apiResource('znote-news', ZnoteNewsController::class);
    Route::apiResource('znote-accounts', ZnoteAccountsController::class);
    Route::apiResource('znote-shop-orders', ZnoteShopOrdersController::class);
    Route::apiResource('znote-shop-logs', ZnoteShopLogsController::class);
    Route::apiResource('znote-forum', ZnoteForumController::class);
    Route::apiResource('znote-forum-threads', ZnoteForumThreadsController::class);
    Route::apiResource('znote-forum-posts', ZnoteForumPostsController::class);
    Route::apiResource('znote-tickets', ZnoteTicketsController::class);
    Route::apiResource('znote-tickets-replies', ZnoteTicketsRepliesController::class);
    Route::apiResource('znote-players', ZnotePlayersController::class);
    Route::apiResource('znote-deleted-characters', ZnoteDeletedCharactersController::class);
    Route::apiResource('znote-images', ZnoteImagesController::class);
    Route::apiResource('znote-pagseguro', ZnotePagseguroController::class);
    Route::apiResource('znote-paygol', ZnotePaygolController::class);
    Route::apiResource('znote-paypal', ZnotePaypalController::class);
    Route::apiResource('znote-changelog', ZnoteChangelogController::class);
    Route::apiResource('znote-global-storage', ZnoteGlobalStorageController::class);
    Route::apiResource('znote-guild-wars', ZnoteGuildWarsController::class);
    Route::apiResource('znote-player-reports', ZnotePlayerReportsController::class);
    Route::apiResource('znote-visitors-details', ZnoteVisitorsDetailsController::class);
    Route::apiResource('znote-pagseguro-notifications', ZnotePagseguroNotificationsController::class);
    Route::apiResource('znote-visitors', ZnoteVisitorsController::class);

    // Core OTServer
    Route::apiResource('players', PlayerController::class);
    Route::apiResource('guilds', GuildController::class);
    Route::apiResource('houses', HouseController::class);
    Route::apiResource('guild-war-kills', GuildWarKillController::class);
    Route::apiResource('guild-ranks', GuildRankController::class);
    Route::apiResource('guild-memberships', GuildMembershipController::class);
    Route::apiResource('guild-invites', GuildInviteController::class);
    Route::apiResource('house-lists', HouseListController::class);
    Route::apiResource('accounts', AccountController::class);
    Route::apiResource('account-ban-history', AccountBanHistoryController::class);
    Route::apiResource('player-deaths', PlayerDeathsController::class);
    Route::apiResource('player-items', PlayerItemsController::class);
    Route::apiResource('market-offers', MarketOffersController::class);

    // Auth endpoints
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');
    Route::post('register', [RegisterController::class, 'register']);

    // Highscores e status do servidor
    Route::get('highscores', [ServerInfoController::class, 'highscores']);
    Route::get('server-info', [ServerInfoController::class, 'status']);
});

// Web routes
Route::get('/highscores', function (Request $request) {
    $rankingType = $request->input('type', 'experience');
    $vocation = $request->input('vocation', 'all');
    $page = max(1, (int)$request->input('page', 1));
    $perPage = 20;

    $query = \App\Models\Player::query();
    if ($vocation !== 'all') {
        $query->where('vocation', $vocation);
    }
    if ($rankingType === 'experience') {
        $query->orderBy('experience', 'desc');
    } else {
        $query->orderBy('level', 'desc');
    }
    $players = $query->skip(($page-1)*$perPage)->take($perPage)->get(['name', 'level', 'vocation', 'experience']);
    $total = $query->count();
    $maxPages = ceil($total / $perPage);
    return view('highscores', compact('players', 'rankingType', 'vocation', 'page', 'maxPages'));
});
Route::get('/guilds', function () {
    return view('guilds');
});
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/myaccount', [AccountController::class, 'myAccount'])->middleware('auth')->name('myaccount');
Route::get('/support', function () {
    return view('support');
});
Route::get('/downloads', function () {
    return view('downloads');
});
Route::get('/forum', function () {
    return view('forum');
});
Route::get('/gallery', function () {
    return view('gallery');
});
Route::get('/houses', function () {
    return view('houses');
});
Route::get('/market', function () {
    return view('market');
});
Route::get('/onlinelist', function () {
    return view('onlinelist');
});
Route::get('/serverinfo', function () {
    return view('serverinfo');
});
Route::get('/changepassword', function () {
    return view('changepassword');
});
Route::get('/createcharacter', function () {
    return view('createcharacter');
});
Route::get('/characterprofile', [CharacterProfileController::class, 'show'])->name('characterprofile');
Route::get('/deaths', function () {
    return view('deaths');
});
Route::get('/changelog', function () {
    return view('changelog');
});
Route::get('/credits', function () {
    return view('credits');
});
Route::get('/guildwar', function () {
    return view('guildwar');
});
Route::get('/buypoints', function () {
    return view('buypoints');
});
Route::get('/spells', function () {
    return view('spells');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/settings', [SettingsController::class, 'show'])->name('settings');
Route::post('/settings', [SettingsController::class, 'update'])->name('settings.update');
Route::get('/recovery', function () {
    return view('recovery');
});
Route::get('/achievements', function () {
    return view('achievements');
});
Route::get('/auctionChar', function () {
    return view('auctionChar');
});
Route::get('/powergamers', function () {
    return view('powergamers');
});
Route::get('/toponline', function () {
    return view('toponline');
});
Route::get('/topguilds', function () {
    return view('topguilds');
});

// Example: Protecting routes with auth middleware
Route::middleware(['auth'])->group(function () {
    // Add here the routes that require authentication
    // Example:
    // Route::get('/myaccount', [AccountController::class, 'myAccount']);
});

// Admin routes (protegidas por middleware 'auth' e 'admin')
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () { return view('admin.dashboard'); });
    Route::get('/admin/news', function () { return view('admin.news'); });
    Route::get('/admin/shop', function () { return view('admin.shop'); });
    Route::get('/admin/gallery', function () { return view('admin.gallery'); });
    Route::get('/admin/helpdesk', function () { return view('admin.helpdesk'); });
    Route::get('/admin/reports', function () { return view('admin.reports'); });
    Route::get('/admin/skills', function () { return view('admin.skills'); });
});

// Rotas de autenticação (apenas para visitantes)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

// Rota de logout (apenas para autenticados)
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/createcharacter', [CharacterController::class, 'showCreateForm'])->name('createcharacter');
    Route::post('/createcharacter', [CharacterController::class, 'create'])->name('createcharacter.post');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/myaccount', [AccountController::class, 'myAccount'])->name('myaccount');
    Route::post('/myaccount', [AccountController::class, 'handleAction'])->name('myaccount.action');
});

Route::post('/shop/purchase/{id}', [ShopController::class, 'purchase'])->middleware('auth')->name('shop.purchase');

Route::get('/sidebar-data', function () {
    // Top 5 players
    $topPlayers = Cache::remember('top_players', 60, function () {
        return DB::table('players')
            ->select('name', 'level')
            ->where('group_id', '<', 2) // Ajuste conforme necessário
            ->orderByDesc('experience')
            ->limit(5)
            ->get();
    });

    // Server info
    $playersOnline = Cache::remember('players_online', 30, function () {
        return DB::table('players')->where('online', 1)->count();
    });
    $registeredAccounts = Cache::remember('registered_accounts', 300, function () {
        return DB::table('accounts')->count();
    });
    $serverOnline = $playersOnline > 0;

    return response()->json([
        'topPlayers' => $topPlayers,
        'serverInfo' => [
            'online' => $serverOnline,
            'playersOnline' => $playersOnline,
            'registeredAccounts' => $registeredAccounts,
        ]
    ]);
});
