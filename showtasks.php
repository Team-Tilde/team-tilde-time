



<!DOCTYPE html>
<html lang="en" class=" is-copy-enabled is-u2f-enabled">
  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# object: http://ogp.me/ns/object# article: http://ogp.me/ns/article# profile: http://ogp.me/ns/profile#">
    <meta charset='utf-8'>
    

    <link crossorigin="anonymous" href="https://assets-cdn.github.com/assets/frameworks-8cec7660fdf513d8dea120b20328384171ac828e70cf4f032eeb82dd4c16871b.css" integrity="sha256-jOx2YP31E9jeoSCyAyg4QXGsgo5wz08DLuuC3UwWhxs=" media="all" rel="stylesheet" />
    <link crossorigin="anonymous" href="https://assets-cdn.github.com/assets/github-117401937454c3c0982f12ddf42c891a5aee87d69f3b20278b23f9ca2926bf21.css" integrity="sha256-EXQBk3RUw8CYLxLd9CyJGlruh9afOyAniyP5yikmvyE=" media="all" rel="stylesheet" />
    
    
    
    

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta name="viewport" content="width=device-width">
    
    <title>team-tilde-time/showtasks.php at prototyping · Team-Tilde/team-tilde-time</title>
    <link rel="search" type="application/opensearchdescription+xml" href="/opensearch.xml" title="GitHub">
    <link rel="fluid-icon" href="https://github.com/fluidicon.png" title="GitHub">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
    <meta property="fb:app_id" content="1401488693436528">

      <meta content="https://avatars0.githubusercontent.com/u/19207006?v=3&amp;s=400" name="twitter:image:src" /><meta content="@github" name="twitter:site" /><meta content="summary" name="twitter:card" /><meta content="Team-Tilde/team-tilde-time" name="twitter:title" /><meta content="team-tilde-time - Team Tilde - Time Management, Organizer" name="twitter:description" />
      <meta content="https://avatars0.githubusercontent.com/u/19207006?v=3&amp;s=400" property="og:image" /><meta content="GitHub" property="og:site_name" /><meta content="object" property="og:type" /><meta content="Team-Tilde/team-tilde-time" property="og:title" /><meta content="https://github.com/Team-Tilde/team-tilde-time" property="og:url" /><meta content="team-tilde-time - Team Tilde - Time Management, Organizer" property="og:description" />
      <meta name="browser-stats-url" content="https://api.github.com/_private/browser/stats">
    <meta name="browser-errors-url" content="https://api.github.com/_private/browser/errors">
    <link rel="assets" href="https://assets-cdn.github.com/">
    <link rel="web-socket" href="wss://live.github.com/_sockets/MTkyMDczNDA6NTIyMzk2YzRiNzE2OWQ5ZDAxOGNkYThiMjllNWYxNDY6MjliMTFlYzNlZjk0NDUwZDNkZGE2OWM3YmUyMDlkY2ViMjhiMDRhZThiZjEzMWU0ZjMwNjFjMDE3MmJhOTg3OA==--aac0cb6c82ece003896613a325f49d78fdd4685d">
    <meta name="pjax-timeout" content="1000">
    <link rel="sudo-modal" href="/sessions/sudo_modal">
    <meta name="request-id" content="6E159C43:44F2:E98D869:580614D0" data-pjax-transient>

    <meta name="msapplication-TileImage" content="/windows-tile.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="selected-link" value="repo_source" data-pjax-transient>

    <meta name="google-site-verification" content="KT5gs8h0wvaagLKAVWq8bbeNwnZZK1r1XQysX3xurLU">
<meta name="google-site-verification" content="ZzhVyEFwb7w3e0-uOTltm8Jsck2F5StVihD0exw2fsA">
    <meta name="google-analytics" content="UA-3769691-2">

<meta content="collector.githubapp.com" name="octolytics-host" /><meta content="github" name="octolytics-app-id" /><meta content="6E159C43:44F2:E98D869:580614D0" name="octolytics-dimension-request_id" /><meta content="19207340" name="octolytics-actor-id" /><meta content="anthonyla3" name="octolytics-actor-login" /><meta content="c46f6a03f4af87088c18f39d12fab602a2b81dd68dc161fcea0ef4f9c181921b" name="octolytics-actor-hash" />
<meta content="/&lt;user-name&gt;/&lt;repo-name&gt;/blob/show" data-pjax-transient="true" name="analytics-location" />



  <meta class="js-ga-set" name="dimension1" content="Logged In">



        <meta name="hostname" content="github.com">
    <meta name="user-login" content="anthonyla3">

        <meta name="expected-hostname" content="github.com">
      <meta name="js-proxy-site-detection-payload" content="Yjk2MGEzOTA4YmE2MjJjMmY2YTNmY2ZlM2Q5ZWNhNWI0YjY4MTEwY2Y4MzU5ZjVlMDU0NTM1NjJhYmQ3YjNlOXx7InJlbW90ZV9hZGRyZXNzIjoiMTEwLjIxLjE1Ni42NyIsInJlcXVlc3RfaWQiOiI2RTE1OUM0Mzo0NEYyOkU5OEQ4Njk6NTgwNjE0RDAiLCJ0aW1lc3RhbXAiOjE0NzY3OTM1NTUsImhvc3QiOiJnaXRodWIuY29tIn0=">


      <link rel="mask-icon" href="https://assets-cdn.github.com/pinned-octocat.svg" color="#4078c0">
      <link rel="icon" type="image/x-icon" href="https://assets-cdn.github.com/favicon.ico">

    <meta name="html-safe-nonce" content="8a7d43f2e27d702d90aefb3c1e4371d25f324bdf">
    <meta content="ca1f2989d10520c41664b880f0ff08e7ec9a52ce" name="form-nonce" />

    <meta http-equiv="x-pjax-version" content="f7e71ce0b405b629388a1771cd0ddad3">
    

      
  <meta name="description" content="team-tilde-time - Team Tilde - Time Management, Organizer">
  <meta name="go-import" content="github.com/Team-Tilde/team-tilde-time git https://github.com/Team-Tilde/team-tilde-time.git">

  <meta content="19207006" name="octolytics-dimension-user_id" /><meta content="Team-Tilde" name="octolytics-dimension-user_login" /><meta content="58131061" name="octolytics-dimension-repository_id" /><meta content="Team-Tilde/team-tilde-time" name="octolytics-dimension-repository_nwo" /><meta content="true" name="octolytics-dimension-repository_public" /><meta content="false" name="octolytics-dimension-repository_is_fork" /><meta content="58131061" name="octolytics-dimension-repository_network_root_id" /><meta content="Team-Tilde/team-tilde-time" name="octolytics-dimension-repository_network_root_nwo" />
  <link href="https://github.com/Team-Tilde/team-tilde-time/commits/prototyping.atom" rel="alternate" title="Recent Commits to team-tilde-time:prototyping" type="application/atom+xml">


      <link rel="canonical" href="https://github.com/Team-Tilde/team-tilde-time/blob/prototyping/showtasks.php" data-pjax-transient>
  </head>


  <body class="logged-in  env-production windows vis-public page-blob">
    <div id="js-pjax-loader-bar" class="pjax-loader-bar"><div class="progress"></div></div>
    <a href="#start-of-content" tabindex="1" class="accessibility-aid js-skip-to-content">Skip to content</a>

    
    
    



        <div class="header header-logged-in true" role="banner">
  <div class="container clearfix">

    <a class="header-logo-invertocat" href="https://github.com/" data-hotkey="g d" aria-label="Homepage" data-ga-click="Header, go to dashboard, icon:logo">
  <svg aria-hidden="true" class="octicon octicon-mark-github" height="28" version="1.1" viewBox="0 0 16 16" width="28"><path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0 0 16 8c0-4.42-3.58-8-8-8z"></path></svg>
</a>


        <div class="header-search scoped-search site-scoped-search js-site-search" role="search">
  <!-- '"` --><!-- </textarea></xmp> --></option></form><form accept-charset="UTF-8" action="/Team-Tilde/team-tilde-time/search" class="js-site-search-form" data-scoped-search-url="/Team-Tilde/team-tilde-time/search" data-unscoped-search-url="/search" method="get"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /></div>
    <label class="form-control header-search-wrapper js-chromeless-input-container">
      <div class="header-search-scope">This repository</div>
      <input type="text"
        class="form-control header-search-input js-site-search-focus js-site-search-field is-clearable"
        data-hotkey="s"
        name="q"
        placeholder="Search"
        aria-label="Search this repository"
        data-unscoped-placeholder="Search GitHub"
        data-scoped-placeholder="Search"
        autocapitalize="off">
    </label>
</form></div>


      <ul class="header-nav float-left" role="navigation">
        <li class="header-nav-item">
          <a href="/pulls" aria-label="Pull requests you created" class="js-selected-navigation-item header-nav-link" data-ga-click="Header, click, Nav menu - item:pulls context:user" data-hotkey="g p" data-selected-links="/pulls /pulls/assigned /pulls/mentioned /pulls">
            Pull requests
</a>        </li>
        <li class="header-nav-item">
          <a href="/issues" aria-label="Issues you created" class="js-selected-navigation-item header-nav-link" data-ga-click="Header, click, Nav menu - item:issues context:user" data-hotkey="g i" data-selected-links="/issues /issues/assigned /issues/mentioned /issues">
            Issues
</a>        </li>
          <li class="header-nav-item">
            <a class="header-nav-link" href="https://gist.github.com/" data-ga-click="Header, go to gist, text:gist">Gist</a>
          </li>
      </ul>

    
<ul class="header-nav user-nav float-right" id="user-links">
  <li class="header-nav-item">
    

  </li>

  <li class="header-nav-item dropdown js-menu-container">
    <a class="header-nav-link tooltipped tooltipped-s js-menu-target" href="/new"
       aria-label="Create new…"
       data-ga-click="Header, create new, icon:add">
      <svg aria-hidden="true" class="octicon octicon-plus float-left" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 9H7v5H5V9H0V7h5V2h2v5h5z"></path></svg>
      <span class="dropdown-caret"></span>
    </a>

    <div class="dropdown-menu-content js-menu-content">
      <ul class="dropdown-menu dropdown-menu-sw">
        
<a class="dropdown-item" href="/new" data-ga-click="Header, create new repository">
  New repository
</a>

  <a class="dropdown-item" href="/new/import" data-ga-click="Header, import a repository">
    Import repository
  </a>


  <a class="dropdown-item" href="/organizations/new" data-ga-click="Header, create new organization">
    New organization
  </a>



  <div class="dropdown-divider"></div>
  <div class="dropdown-header">
    <span title="Team-Tilde/team-tilde-time">This repository</span>
  </div>
    <a class="dropdown-item" href="/Team-Tilde/team-tilde-time/issues/new" data-ga-click="Header, create new issue">
      New issue
    </a>

      </ul>
    </div>
  </li>

  <li class="header-nav-item dropdown js-menu-container">
    <a class="header-nav-link name tooltipped tooltipped-sw js-menu-target" href="/anthonyla3"
       aria-label="View profile and more"
       data-ga-click="Header, show menu, icon:avatar">
      <img alt="@anthonyla3" class="avatar" height="20" src="https://avatars0.githubusercontent.com/u/19207340?v=3&amp;s=40" width="20" />
      <span class="dropdown-caret"></span>
    </a>

    <div class="dropdown-menu-content js-menu-content">
      <div class="dropdown-menu dropdown-menu-sw">
        <div class="dropdown-header header-nav-current-user css-truncate">
          Signed in as <strong class="css-truncate-target">anthonyla3</strong>
        </div>

        <div class="dropdown-divider"></div>

        <a class="dropdown-item" href="/anthonyla3" data-ga-click="Header, go to profile, text:your profile">
          Your profile
        </a>
        <a class="dropdown-item" href="/anthonyla3?tab=stars" data-ga-click="Header, go to starred repos, text:your stars">
          Your stars
        </a>
        <a class="dropdown-item" href="/explore" data-ga-click="Header, go to explore, text:explore">
          Explore
        </a>
          <a class="dropdown-item" href="/integrations" data-ga-click="Header, go to integrations, text:integrations">
            Integrations
          </a>
        <a class="dropdown-item" href="https://help.github.com" data-ga-click="Header, go to help, text:help">
          Help
        </a>


        <div class="dropdown-divider"></div>

        <a class="dropdown-item" href="/settings/profile" data-ga-click="Header, go to settings, icon:settings">
          Settings
        </a>

        <!-- '"` --><!-- </textarea></xmp> --></option></form><form accept-charset="UTF-8" action="/logout" class="logout-form" data-form-nonce="ca1f2989d10520c41664b880f0ff08e7ec9a52ce" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /><input name="authenticity_token" type="hidden" value="0e9Xqec4ixkl8EBiELjG8D2C8LVh2AQ3mYYCbCYnVm8OFwfxGlsHkm3RrRPsQL1jtZXZ1MHsPavLsH5FBhTGvQ==" /></div>
          <button type="submit" class="dropdown-item dropdown-signout" data-ga-click="Header, sign out, icon:logout">
            Sign out
          </button>
</form>      </div>
    </div>
  </li>
</ul>


    
  </div>
</div>


      


    <div id="start-of-content" class="accessibility-aid"></div>

      <div id="js-flash-container">
</div>


    <div role="main">
        <div itemscope itemtype="http://schema.org/SoftwareSourceCode">
    <div id="js-repo-pjax-container" data-pjax-container>
      
<div class="pagehead repohead instapaper_ignore readability-menu experiment-repo-nav">
  <div class="container repohead-details-container">

    

<ul class="pagehead-actions">

  <li>
        <!-- '"` --><!-- </textarea></xmp> --></option></form><form accept-charset="UTF-8" action="/notifications/subscribe" class="js-social-container" data-autosubmit="true" data-form-nonce="ca1f2989d10520c41664b880f0ff08e7ec9a52ce" data-remote="true" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /><input name="authenticity_token" type="hidden" value="SdycIvPcTO3lwH5QdxgEkDszUgYF2lQV+JPjEoWeFTXuParYGz6Zv136mxh6vosJQkAW7T57Fvmv0X7bXoPl2g==" /></div>      <input class="form-control" id="repository_id" name="repository_id" type="hidden" value="58131061" />

        <div class="select-menu js-menu-container js-select-menu">
          <a href="/Team-Tilde/team-tilde-time/subscription"
            class="btn btn-sm btn-with-count select-menu-button js-menu-target" role="button" tabindex="0" aria-haspopup="true"
            data-ga-click="Repository, click Watch settings, action:blob#show">
            <span class="js-select-button">
              <svg aria-hidden="true" class="octicon octicon-eye" height="16" version="1.1" viewBox="0 0 16 16" width="16"><path d="M8.06 2C3 2 0 8 0 8s3 6 8.06 6C13 14 16 8 16 8s-3-6-7.94-6zM8 12c-2.2 0-4-1.78-4-4 0-2.2 1.8-4 4-4 2.22 0 4 1.8 4 4 0 2.22-1.78 4-4 4zm2-4c0 1.11-.89 2-2 2-1.11 0-2-.89-2-2 0-1.11.89-2 2-2 1.11 0 2 .89 2 2z"></path></svg>
              Unwatch
            </span>
          </a>
          <a class="social-count js-social-count"
            href="/Team-Tilde/team-tilde-time/watchers"
            aria-label="9 users are watching this repository">
            9
          </a>

        <div class="select-menu-modal-holder">
          <div class="select-menu-modal subscription-menu-modal js-menu-content" aria-hidden="true">
            <div class="select-menu-header js-navigation-enable" tabindex="-1">
              <svg aria-label="Close" class="octicon octicon-x js-menu-close" height="16" role="img" version="1.1" viewBox="0 0 12 16" width="12"><path d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48z"></path></svg>
              <span class="select-menu-title">Notifications</span>
            </div>

              <div class="select-menu-list js-navigation-container" role="menu">

                <div class="select-menu-item js-navigation-item " role="menuitem" tabindex="0">
                  <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
                  <div class="select-menu-item-text">
                    <input id="do_included" name="do" type="radio" value="included" />
                    <span class="select-menu-item-heading">Not watching</span>
                    <span class="description">Be notified when participating or @mentioned.</span>
                    <span class="js-select-button-text hidden-select-button-text">
                      <svg aria-hidden="true" class="octicon octicon-eye" height="16" version="1.1" viewBox="0 0 16 16" width="16"><path d="M8.06 2C3 2 0 8 0 8s3 6 8.06 6C13 14 16 8 16 8s-3-6-7.94-6zM8 12c-2.2 0-4-1.78-4-4 0-2.2 1.8-4 4-4 2.22 0 4 1.8 4 4 0 2.22-1.78 4-4 4zm2-4c0 1.11-.89 2-2 2-1.11 0-2-.89-2-2 0-1.11.89-2 2-2 1.11 0 2 .89 2 2z"></path></svg>
                      Watch
                    </span>
                  </div>
                </div>

                <div class="select-menu-item js-navigation-item selected" role="menuitem" tabindex="0">
                  <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
                  <div class="select-menu-item-text">
                    <input checked="checked" id="do_subscribed" name="do" type="radio" value="subscribed" />
                    <span class="select-menu-item-heading">Watching</span>
                    <span class="description">Be notified of all conversations.</span>
                    <span class="js-select-button-text hidden-select-button-text">
                      <svg aria-hidden="true" class="octicon octicon-eye" height="16" version="1.1" viewBox="0 0 16 16" width="16"><path d="M8.06 2C3 2 0 8 0 8s3 6 8.06 6C13 14 16 8 16 8s-3-6-7.94-6zM8 12c-2.2 0-4-1.78-4-4 0-2.2 1.8-4 4-4 2.22 0 4 1.8 4 4 0 2.22-1.78 4-4 4zm2-4c0 1.11-.89 2-2 2-1.11 0-2-.89-2-2 0-1.11.89-2 2-2 1.11 0 2 .89 2 2z"></path></svg>
                      Unwatch
                    </span>
                  </div>
                </div>

                <div class="select-menu-item js-navigation-item " role="menuitem" tabindex="0">
                  <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
                  <div class="select-menu-item-text">
                    <input id="do_ignore" name="do" type="radio" value="ignore" />
                    <span class="select-menu-item-heading">Ignoring</span>
                    <span class="description">Never be notified.</span>
                    <span class="js-select-button-text hidden-select-button-text">
                      <svg aria-hidden="true" class="octicon octicon-mute" height="16" version="1.1" viewBox="0 0 16 16" width="16"><path d="M8 2.81v10.38c0 .67-.81 1-1.28.53L3 10H1c-.55 0-1-.45-1-1V7c0-.55.45-1 1-1h2l3.72-3.72C7.19 1.81 8 2.14 8 2.81zm7.53 3.22l-1.06-1.06-1.97 1.97-1.97-1.97-1.06 1.06L11.44 8 9.47 9.97l1.06 1.06 1.97-1.97 1.97 1.97 1.06-1.06L13.56 8l1.97-1.97z"></path></svg>
                      Stop ignoring
                    </span>
                  </div>
                </div>

              </div>

            </div>
          </div>
        </div>
</form>
  </li>

  <li>
    
  <div class="js-toggler-container js-social-container starring-container ">

    <!-- '"` --><!-- </textarea></xmp> --></option></form><form accept-charset="UTF-8" action="/Team-Tilde/team-tilde-time/unstar" class="starred" data-form-nonce="ca1f2989d10520c41664b880f0ff08e7ec9a52ce" data-remote="true" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /><input name="authenticity_token" type="hidden" value="B6Dk+CpgVqxlaEFLGMFjckHI1/MxJ9A1FdeT2vhQZEdrQWWyLP351aDdGuVxyJejVWC3Gsgg4LG2lTZlB4t+kw==" /></div>
      <button
        type="submit"
        class="btn btn-sm btn-with-count js-toggler-target"
        aria-label="Unstar this repository" title="Unstar Team-Tilde/team-tilde-time"
        data-ga-click="Repository, click unstar button, action:blob#show; text:Unstar">
        <svg aria-hidden="true" class="octicon octicon-star" height="16" version="1.1" viewBox="0 0 14 16" width="14"><path d="M14 6l-4.9-.64L7 1 4.9 5.36 0 6l3.6 3.26L2.67 14 7 11.67 11.33 14l-.93-4.74z"></path></svg>
        Unstar
      </button>
        <a class="social-count js-social-count" href="/Team-Tilde/team-tilde-time/stargazers"
           aria-label="2 users starred this repository">
          2
        </a>
</form>
    <!-- '"` --><!-- </textarea></xmp> --></option></form><form accept-charset="UTF-8" action="/Team-Tilde/team-tilde-time/star" class="unstarred" data-form-nonce="ca1f2989d10520c41664b880f0ff08e7ec9a52ce" data-remote="true" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /><input name="authenticity_token" type="hidden" value="rbE9xh05UQrp/DGcvo40/kBcKfjsSI7C4HUOgUy/3ohfDpNZPpO27dPWsdO8hB+Qs3rOSzDfM34LOdWmOybSfg==" /></div>
      <button
        type="submit"
        class="btn btn-sm btn-with-count js-toggler-target"
        aria-label="Star this repository" title="Star Team-Tilde/team-tilde-time"
        data-ga-click="Repository, click star button, action:blob#show; text:Star">
        <svg aria-hidden="true" class="octicon octicon-star" height="16" version="1.1" viewBox="0 0 14 16" width="14"><path d="M14 6l-4.9-.64L7 1 4.9 5.36 0 6l3.6 3.26L2.67 14 7 11.67 11.33 14l-.93-4.74z"></path></svg>
        Star
      </button>
        <a class="social-count js-social-count" href="/Team-Tilde/team-tilde-time/stargazers"
           aria-label="2 users starred this repository">
          2
        </a>
</form>  </div>

  </li>

  <li>
          <a href="#fork-destination-box" class="btn btn-sm btn-with-count"
              title="Fork your own copy of Team-Tilde/team-tilde-time to your account"
              aria-label="Fork your own copy of Team-Tilde/team-tilde-time to your account"
              rel="facebox"
              data-ga-click="Repository, show fork modal, action:blob#show; text:Fork">
              <svg aria-hidden="true" class="octicon octicon-repo-forked" height="16" version="1.1" viewBox="0 0 10 16" width="10"><path d="M8 1a1.993 1.993 0 0 0-1 3.72V6L5 8 3 6V4.72A1.993 1.993 0 0 0 2 1a1.993 1.993 0 0 0-1 3.72V6.5l3 3v1.78A1.993 1.993 0 0 0 5 15a1.993 1.993 0 0 0 1-3.72V9.5l3-3V4.72A1.993 1.993 0 0 0 8 1zM2 4.2C1.34 4.2.8 3.65.8 3c0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2 0 .65-.55 1.2-1.2 1.2zm3 10c-.66 0-1.2-.55-1.2-1.2 0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2 0 .65-.55 1.2-1.2 1.2zm3-10c-.66 0-1.2-.55-1.2-1.2 0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2 0 .65-.55 1.2-1.2 1.2z"></path></svg>
            Fork
          </a>

          <div id="fork-destination-box" style="display: none;">
            <h2 class="facebox-header" data-facebox-id="facebox-header">Where should we fork this repository?</h2>
            <include-fragment src=""
                class="js-fork-select-fragment fork-select-fragment"
                data-url="/Team-Tilde/team-tilde-time/fork?fragment=1">
              <img alt="Loading" height="64" src="https://assets-cdn.github.com/images/spinners/octocat-spinner-128.gif" width="64" />
            </include-fragment>
          </div>

    <a href="/Team-Tilde/team-tilde-time/network" class="social-count"
       aria-label="1 user is forked this repository">
      1
    </a>
  </li>
</ul>

    <h1 class="public ">
  <svg aria-hidden="true" class="octicon octicon-repo" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M4 9H3V8h1v1zm0-3H3v1h1V6zm0-2H3v1h1V4zm0-2H3v1h1V2zm8-1v12c0 .55-.45 1-1 1H6v2l-1.5-1.5L3 16v-2H1c-.55 0-1-.45-1-1V1c0-.55.45-1 1-1h10c.55 0 1 .45 1 1zm-1 10H1v2h2v-1h3v1h5v-2zm0-10H2v9h9V1z"></path></svg>
  <span class="author" itemprop="author"><a href="/Team-Tilde" class="url fn" rel="author">Team-Tilde</a></span><!--
--><span class="path-divider">/</span><!--
--><strong itemprop="name"><a href="/Team-Tilde/team-tilde-time" data-pjax="#js-repo-pjax-container">team-tilde-time</a></strong>

</h1>

  </div>
  <div class="container">
    
<nav class="reponav js-repo-nav js-sidenav-container-pjax"
     itemscope
     itemtype="http://schema.org/BreadcrumbList"
     role="navigation"
     data-pjax="#js-repo-pjax-container">

  <span itemscope itemtype="http://schema.org/ListItem" itemprop="itemListElement">
    <a href="/Team-Tilde/team-tilde-time/tree/prototyping" aria-selected="true" class="js-selected-navigation-item selected reponav-item" data-hotkey="g c" data-selected-links="repo_source repo_downloads repo_commits repo_releases repo_tags repo_branches /Team-Tilde/team-tilde-time/tree/prototyping" itemprop="url">
      <svg aria-hidden="true" class="octicon octicon-code" height="16" version="1.1" viewBox="0 0 14 16" width="14"><path d="M9.5 3L8 4.5 11.5 8 8 11.5 9.5 13 14 8 9.5 3zm-5 0L0 8l4.5 5L6 11.5 2.5 8 6 4.5 4.5 3z"></path></svg>
      <span itemprop="name">Code</span>
      <meta itemprop="position" content="1">
</a>  </span>

    <span itemscope itemtype="http://schema.org/ListItem" itemprop="itemListElement">
      <a href="/Team-Tilde/team-tilde-time/issues" class="js-selected-navigation-item reponav-item" data-hotkey="g i" data-selected-links="repo_issues repo_labels repo_milestones /Team-Tilde/team-tilde-time/issues" itemprop="url">
        <svg aria-hidden="true" class="octicon octicon-issue-opened" height="16" version="1.1" viewBox="0 0 14 16" width="14"><path d="M7 2.3c3.14 0 5.7 2.56 5.7 5.7s-2.56 5.7-5.7 5.7A5.71 5.71 0 0 1 1.3 8c0-3.14 2.56-5.7 5.7-5.7zM7 1C3.14 1 0 4.14 0 8s3.14 7 7 7 7-3.14 7-7-3.14-7-7-7zm1 3H6v5h2V4zm0 6H6v2h2v-2z"></path></svg>
        <span itemprop="name">Issues</span>
        <span class="counter">0</span>
        <meta itemprop="position" content="2">
</a>    </span>

  <span itemscope itemtype="http://schema.org/ListItem" itemprop="itemListElement">
    <a href="/Team-Tilde/team-tilde-time/pulls" class="js-selected-navigation-item reponav-item" data-hotkey="g p" data-selected-links="repo_pulls /Team-Tilde/team-tilde-time/pulls" itemprop="url">
      <svg aria-hidden="true" class="octicon octicon-git-pull-request" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M11 11.28V5c-.03-.78-.34-1.47-.94-2.06C9.46 2.35 8.78 2.03 8 2H7V0L4 3l3 3V4h1c.27.02.48.11.69.31.21.2.3.42.31.69v6.28A1.993 1.993 0 0 0 10 15a1.993 1.993 0 0 0 1-3.72zm-1 2.92c-.66 0-1.2-.55-1.2-1.2 0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2 0 .65-.55 1.2-1.2 1.2zM4 3c0-1.11-.89-2-2-2a1.993 1.993 0 0 0-1 3.72v6.56A1.993 1.993 0 0 0 2 15a1.993 1.993 0 0 0 1-3.72V4.72c.59-.34 1-.98 1-1.72zm-.8 10c0 .66-.55 1.2-1.2 1.2-.65 0-1.2-.55-1.2-1.2 0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2zM2 4.2C1.34 4.2.8 3.65.8 3c0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2 0 .65-.55 1.2-1.2 1.2z"></path></svg>
      <span itemprop="name">Pull requests</span>
      <span class="counter">1</span>
      <meta itemprop="position" content="3">
</a>  </span>

  <a href="/Team-Tilde/team-tilde-time/projects" class="js-selected-navigation-item reponav-item" data-selected-links="repo_projects new_repo_project repo_project /Team-Tilde/team-tilde-time/projects">
    <svg class="octicon" aria-hidden="true" version="1.1" width="15" height="16" viewBox="0 0 15 16">
      <path d="M1 15h13V1H1v14zM15 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1a1 1 0 0 1 1-1h13a1 1 0 0 1 1 1zm-4.41 11h1.82c.59 0 .59-.41.59-1V3c0-.59 0-1-.59-1h-1.82C10 2 10 2.41 10 3v8c0 .59 0 1 .59 1zm-4-2h1.82C9 10 9 9.59 9 9V3c0-.59 0-1-.59-1H6.59C6 2 6 2.41 6 3v6c0 .59 0 1 .59 1zM2 13V3c0-.59 0-1 .59-1h1.82C5 2 5 2.41 5 3v10c0 .59 0 1-.59 1H2.59C2 14 2 13.59 2 13z"></path>
    </svg>
    Projects
    <span class="counter">0</span>
</a>
    <a href="/Team-Tilde/team-tilde-time/wiki" class="js-selected-navigation-item reponav-item" data-hotkey="g w" data-selected-links="repo_wiki /Team-Tilde/team-tilde-time/wiki">
      <svg aria-hidden="true" class="octicon octicon-book" height="16" version="1.1" viewBox="0 0 16 16" width="16"><path d="M3 5h4v1H3V5zm0 3h4V7H3v1zm0 2h4V9H3v1zm11-5h-4v1h4V5zm0 2h-4v1h4V7zm0 2h-4v1h4V9zm2-6v9c0 .55-.45 1-1 1H9.5l-1 1-1-1H2c-.55 0-1-.45-1-1V3c0-.55.45-1 1-1h5.5l1 1 1-1H15c.55 0 1 .45 1 1zm-8 .5L7.5 3H2v9h6V3.5zm7-.5H9.5l-.5.5V12h6V3z"></path></svg>
      Wiki
</a>

  <a href="/Team-Tilde/team-tilde-time/pulse" class="js-selected-navigation-item reponav-item" data-selected-links="pulse /Team-Tilde/team-tilde-time/pulse">
    <svg aria-hidden="true" class="octicon octicon-pulse" height="16" version="1.1" viewBox="0 0 14 16" width="14"><path d="M11.5 8L8.8 5.4 6.6 8.5 5.5 1.6 2.38 8H0v2h3.6l.9-1.8.9 5.4L9 8.5l1.6 1.5H14V8z"></path></svg>
    Pulse
</a>
  <a href="/Team-Tilde/team-tilde-time/graphs" class="js-selected-navigation-item reponav-item" data-selected-links="repo_graphs repo_contributors /Team-Tilde/team-tilde-time/graphs">
    <svg aria-hidden="true" class="octicon octicon-graph" height="16" version="1.1" viewBox="0 0 16 16" width="16"><path d="M16 14v1H0V0h1v14h15zM5 13H3V8h2v5zm4 0H7V3h2v10zm4 0h-2V6h2v7z"></path></svg>
    Graphs
</a>

</nav>

  </div>
</div>

<div class="container new-discussion-timeline experiment-repo-nav">
  <div class="repository-content">

    

<a href="/Team-Tilde/team-tilde-time/blob/66a38166b6393919808b5bea01382dfe4f5a94e0/showtasks.php" class="d-none js-permalink-shortcut" data-hotkey="y">Permalink</a>

<!-- blob contrib key: blob_contributors:v21:2cb66e28b10e15013ae755aca7567655 -->

<div class="file-navigation js-zeroclipboard-container">
  
<div class="select-menu branch-select-menu js-menu-container js-select-menu float-left">
  <button class="btn btn-sm select-menu-button js-menu-target css-truncate" data-hotkey="w"
    
    type="button" aria-label="Switch branches or tags" tabindex="0" aria-haspopup="true">
    <i>Branch:</i>
    <span class="js-select-button css-truncate-target">prototyping</span>
  </button>

  <div class="select-menu-modal-holder js-menu-content js-navigation-container" data-pjax aria-hidden="true">

    <div class="select-menu-modal">
      <div class="select-menu-header">
        <svg aria-label="Close" class="octicon octicon-x js-menu-close" height="16" role="img" version="1.1" viewBox="0 0 12 16" width="12"><path d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48z"></path></svg>
        <span class="select-menu-title">Switch branches/tags</span>
      </div>

      <div class="select-menu-filters">
        <div class="select-menu-text-filter">
          <input type="text" aria-label="Find or create a branch…" id="context-commitish-filter-field" class="form-control js-filterable-field js-navigation-enable" placeholder="Find or create a branch…">
        </div>
        <div class="select-menu-tabs">
          <ul>
            <li class="select-menu-tab">
              <a href="#" data-tab-filter="branches" data-filter-placeholder="Find or create a branch…" class="js-select-menu-tab" role="tab">Branches</a>
            </li>
            <li class="select-menu-tab">
              <a href="#" data-tab-filter="tags" data-filter-placeholder="Find a tag…" class="js-select-menu-tab" role="tab">Tags</a>
            </li>
          </ul>
        </div>
      </div>

      <div class="select-menu-list select-menu-tab-bucket js-select-menu-tab-bucket" data-tab-filter="branches" role="menu">

        <div data-filterable-for="context-commitish-filter-field" data-filterable-type="substring">


            <a class="select-menu-item js-navigation-item js-navigation-open "
               href="/Team-Tilde/team-tilde-time/blob/master/showtasks.php"
               data-name="master"
               data-skip-pjax="true"
               rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target js-select-menu-filter-text">
                master
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open selected"
               href="/Team-Tilde/team-tilde-time/blob/prototyping/showtasks.php"
               data-name="prototyping"
               data-skip-pjax="true"
               rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target js-select-menu-filter-text">
                prototyping
              </span>
            </a>
        </div>

          <!-- '"` --><!-- </textarea></xmp> --></option></form><form accept-charset="UTF-8" action="/Team-Tilde/team-tilde-time/branches" class="js-create-branch select-menu-item select-menu-new-item-form js-navigation-item js-new-item-form" data-form-nonce="ca1f2989d10520c41664b880f0ff08e7ec9a52ce" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /><input name="authenticity_token" type="hidden" value="FTLZWqUUBm7nKWNP3TvWP/FFK3cXbdzbVFs/Zt0+l1yWJ9+iRDOjtP6kpZatVaGfsEDriyg5x0HKmqfo3H0Jqw==" /></div>
          <svg aria-hidden="true" class="octicon octicon-git-branch select-menu-item-icon" height="16" version="1.1" viewBox="0 0 10 16" width="10"><path d="M10 5c0-1.11-.89-2-2-2a1.993 1.993 0 0 0-1 3.72v.3c-.02.52-.23.98-.63 1.38-.4.4-.86.61-1.38.63-.83.02-1.48.16-2 .45V4.72a1.993 1.993 0 0 0-1-3.72C.88 1 0 1.89 0 3a2 2 0 0 0 1 1.72v6.56c-.59.35-1 .99-1 1.72 0 1.11.89 2 2 2 1.11 0 2-.89 2-2 0-.53-.2-1-.53-1.36.09-.06.48-.41.59-.47.25-.11.56-.17.94-.17 1.05-.05 1.95-.45 2.75-1.25S8.95 7.77 9 6.73h-.02C9.59 6.37 10 5.73 10 5zM2 1.8c.66 0 1.2.55 1.2 1.2 0 .65-.55 1.2-1.2 1.2C1.35 4.2.8 3.65.8 3c0-.65.55-1.2 1.2-1.2zm0 12.41c-.66 0-1.2-.55-1.2-1.2 0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2 0 .65-.55 1.2-1.2 1.2zm6-8c-.66 0-1.2-.55-1.2-1.2 0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2 0 .65-.55 1.2-1.2 1.2z"></path></svg>
            <div class="select-menu-item-text">
              <span class="select-menu-item-heading">Create branch: <span class="js-new-item-name"></span></span>
              <span class="description">from ‘prototyping’</span>
            </div>
            <input type="hidden" name="name" id="name" class="js-new-item-value">
            <input type="hidden" name="branch" id="branch" value="prototyping">
            <input type="hidden" name="path" id="path" value="showtasks.php">
</form>
      </div>

      <div class="select-menu-list select-menu-tab-bucket js-select-menu-tab-bucket" data-tab-filter="tags">
        <div data-filterable-for="context-commitish-filter-field" data-filterable-type="substring">


        </div>

        <div class="select-menu-no-results">Nothing to show</div>
      </div>

    </div>
  </div>
</div>

  <div class="BtnGroup float-right">
    <a href="/Team-Tilde/team-tilde-time/find/prototyping"
          class="js-pjax-capture-input btn btn-sm BtnGroup-item"
          data-pjax
          data-hotkey="t">
      Find file
    </a>
    <button aria-label="Copy file path to clipboard" class="js-zeroclipboard btn btn-sm BtnGroup-item tooltipped tooltipped-s" data-copied-hint="Copied!" type="button">Copy path</button>
  </div>
  <div class="breadcrumb js-zeroclipboard-target">
    <span class="repo-root js-repo-root"><span class="js-path-segment"><a href="/Team-Tilde/team-tilde-time/tree/prototyping"><span>team-tilde-time</span></a></span></span><span class="separator">/</span><strong class="final-path">showtasks.php</strong>
  </div>
</div>


  <div class="commit-tease">
      <span class="float-right">
        <a class="commit-tease-sha" href="/Team-Tilde/team-tilde-time/commit/d384aad608f35db8e4f53dcce86bdac3e22df935" data-pjax>
          d384aad
        </a>
        <relative-time datetime="2016-10-14T08:48:37Z">Oct 14, 2016</relative-time>
      </span>
      <div>
        <img alt="@cfoordddd" class="avatar" height="20" src="https://avatars2.githubusercontent.com/u/19207363?v=3&amp;s=40" width="20" />
        <a href="/cfoordddd" class="user-mention" rel="contributor">cfoordddd</a>
          <a href="/Team-Tilde/team-tilde-time/commit/d384aad608f35db8e4f53dcce86bdac3e22df935" class="message" data-pjax="true" title="Update showtasks.php">Update showtasks.php</a>
      </div>

    <div class="commit-tease-contributors">
      <button type="button" class="btn-link muted-link contributors-toggle" data-facebox="#blob_contributors_box">
        <strong>3</strong>
         contributors
      </button>
          <a class="avatar-link tooltipped tooltipped-s" aria-label="cfoordddd" href="/Team-Tilde/team-tilde-time/commits/prototyping/showtasks.php?author=cfoordddd"><img alt="@cfoordddd" class="avatar" height="20" src="https://avatars2.githubusercontent.com/u/19207363?v=3&amp;s=40" width="20" /> </a>
    <a class="avatar-link tooltipped tooltipped-s" aria-label="MIKUiqnw0" href="/Team-Tilde/team-tilde-time/commits/prototyping/showtasks.php?author=MIKUiqnw0"><img alt="@MIKUiqnw0" class="avatar" height="20" src="https://avatars1.githubusercontent.com/u/572379?v=3&amp;s=40" width="20" /> </a>
    <a class="avatar-link tooltipped tooltipped-s" aria-label="anthonyla3" href="/Team-Tilde/team-tilde-time/commits/prototyping/showtasks.php?author=anthonyla3"><img alt="@anthonyla3" class="avatar" height="20" src="https://avatars0.githubusercontent.com/u/19207340?v=3&amp;s=40" width="20" /> </a>


    </div>

    <div id="blob_contributors_box" style="display:none">
      <h2 class="facebox-header" data-facebox-id="facebox-header">Users who have contributed to this file</h2>
      <ul class="facebox-user-list" data-facebox-id="facebox-description">
          <li class="facebox-user-list-item">
            <img alt="@cfoordddd" height="24" src="https://avatars0.githubusercontent.com/u/19207363?v=3&amp;s=48" width="24" />
            <a href="/cfoordddd">cfoordddd</a>
          </li>
          <li class="facebox-user-list-item">
            <img alt="@MIKUiqnw0" height="24" src="https://avatars3.githubusercontent.com/u/572379?v=3&amp;s=48" width="24" />
            <a href="/MIKUiqnw0">MIKUiqnw0</a>
          </li>
          <li class="facebox-user-list-item">
            <img alt="@anthonyla3" height="24" src="https://avatars2.githubusercontent.com/u/19207340?v=3&amp;s=48" width="24" />
            <a href="/anthonyla3">anthonyla3</a>
          </li>
      </ul>
    </div>
  </div>

<div class="file">
  <div class="file-header">
  <div class="file-actions">

    <div class="BtnGroup">
      <a href="/Team-Tilde/team-tilde-time/raw/prototyping/showtasks.php" class="btn btn-sm BtnGroup-item" id="raw-url">Raw</a>
        <a href="/Team-Tilde/team-tilde-time/blame/prototyping/showtasks.php" class="btn btn-sm js-update-url-with-hash BtnGroup-item">Blame</a>
      <a href="/Team-Tilde/team-tilde-time/commits/prototyping/showtasks.php" class="btn btn-sm BtnGroup-item" rel="nofollow">History</a>
    </div>

        <a class="btn-octicon tooltipped tooltipped-nw"
           href="https://windows.github.com"
           aria-label="Open this file in GitHub Desktop"
           data-ga-click="Repository, open with desktop, type:windows">
            <svg aria-hidden="true" class="octicon octicon-device-desktop" height="16" version="1.1" viewBox="0 0 16 16" width="16"><path d="M15 2H1c-.55 0-1 .45-1 1v9c0 .55.45 1 1 1h5.34c-.25.61-.86 1.39-2.34 2h8c-1.48-.61-2.09-1.39-2.34-2H15c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1zm0 9H1V3h14v8z"></path></svg>
        </a>

        <!-- '"` --><!-- </textarea></xmp> --></option></form><form accept-charset="UTF-8" action="/Team-Tilde/team-tilde-time/edit/prototyping/showtasks.php" class="inline-form js-update-url-with-hash" data-form-nonce="ca1f2989d10520c41664b880f0ff08e7ec9a52ce" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /><input name="authenticity_token" type="hidden" value="G5J31SU3OHIV+CUB+ZOBF1jw/eEyzzt+3BE/RZRXgWkqEkyze+WXsozOwVWB837PjY7VruLTCGAInxarxKE6gQ==" /></div>
          <button class="btn-octicon tooltipped tooltipped-nw" type="submit"
            aria-label="Edit this file" data-hotkey="e" data-disable-with>
            <svg aria-hidden="true" class="octicon octicon-pencil" height="16" version="1.1" viewBox="0 0 14 16" width="14"><path d="M0 12v3h3l8-8-3-3-8 8zm3 2H1v-2h1v1h1v1zm10.3-9.3L12 6 9 3l1.3-1.3a.996.996 0 0 1 1.41 0l1.59 1.59c.39.39.39 1.02 0 1.41z"></path></svg>
          </button>
</form>        <!-- '"` --><!-- </textarea></xmp> --></option></form><form accept-charset="UTF-8" action="/Team-Tilde/team-tilde-time/delete/prototyping/showtasks.php" class="inline-form" data-form-nonce="ca1f2989d10520c41664b880f0ff08e7ec9a52ce" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /><input name="authenticity_token" type="hidden" value="nJwEg+tv4BawTcqA519sJF28+pG8q46TD4K9f71mGS7XdOo4tTkaKDiGL6Q2rRgnh1hrKG1cDe6hOg/GbPQEbA==" /></div>
          <button class="btn-octicon btn-octicon-danger tooltipped tooltipped-nw" type="submit"
            aria-label="Delete this file" data-disable-with>
            <svg aria-hidden="true" class="octicon octicon-trashcan" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M11 2H9c0-.55-.45-1-1-1H5c-.55 0-1 .45-1 1H2c-.55 0-1 .45-1 1v1c0 .55.45 1 1 1v9c0 .55.45 1 1 1h7c.55 0 1-.45 1-1V5c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1zm-1 12H3V5h1v8h1V5h1v8h1V5h1v8h1V5h1v9zm1-10H2V3h9v1z"></path></svg>
          </button>
</form>  </div>

  <div class="file-info">
      71 lines (58 sloc)
      <span class="file-info-divider"></span>
    3.24 KB
  </div>
</div>

  

  <div itemprop="text" class="blob-wrapper data type-php">
      <table class="highlight tab-size js-file-line-container" data-tab-size="8">
      <tr>
        <td id="L1" class="blob-num js-line-number" data-line-number="1"></td>
        <td id="LC1" class="blob-code blob-code-inner js-file-line"><span class="pl-pse">&lt;?php</span><span class="pl-s1"></span></td>
      </tr>
      <tr>
        <td id="L2" class="blob-num js-line-number" data-line-number="2"></td>
        <td id="LC2" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">	<span class="pl-k">require_once</span> <span class="pl-s"><span class="pl-pds">&quot;</span>php/conf.php<span class="pl-pds">&quot;</span></span>;</span></td>
      </tr>
      <tr>
        <td id="L3" class="blob-num js-line-number" data-line-number="3"></td>
        <td id="LC3" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"></span></td>
      </tr>
      <tr>
        <td id="L4" class="blob-num js-line-number" data-line-number="4"></td>
        <td id="LC4" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">	<span class="pl-smi">$conn</span> <span class="pl-k">=</span> <span class="pl-k">new</span> <span class="pl-c1">mysqli</span>(<span class="pl-smi">$DB_HOST</span>, <span class="pl-smi">$DB_USER</span>, <span class="pl-smi">$DB_PASSWORD</span>, <span class="pl-smi">$DB_NAME</span>);</span></td>
      </tr>
      <tr>
        <td id="L5" class="blob-num js-line-number" data-line-number="5"></td>
        <td id="LC5" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">	</span></td>
      </tr>
      <tr>
        <td id="L6" class="blob-num js-line-number" data-line-number="6"></td>
        <td id="LC6" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">	<span class="pl-k">if</span> (<span class="pl-smi">$conn</span><span class="pl-k">-&gt;</span><span class="pl-smi">connect_error</span>) {</span></td>
      </tr>
      <tr>
        <td id="L7" class="blob-num js-line-number" data-line-number="7"></td>
        <td id="LC7" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">		<span class="pl-k">die</span>(<span class="pl-s"><span class="pl-pds">&quot;</span>Connection failed: <span class="pl-pds">&quot;</span></span> <span class="pl-k">.</span> <span class="pl-smi">$conn</span><span class="pl-k">-&gt;</span><span class="pl-smi">connect_error</span>);</span></td>
      </tr>
      <tr>
        <td id="L8" class="blob-num js-line-number" data-line-number="8"></td>
        <td id="LC8" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">	}</span></td>
      </tr>
      <tr>
        <td id="L9" class="blob-num js-line-number" data-line-number="9"></td>
        <td id="LC9" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"></span></td>
      </tr>
      <tr>
        <td id="L10" class="blob-num js-line-number" data-line-number="10"></td>
        <td id="LC10" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">	<span class="pl-smi">$selected</span> <span class="pl-k">=</span> (<span class="pl-k">int</span>)<span class="pl-c1">mysqli_real_escape_string</span>(<span class="pl-smi">$conn</span> ,<span class="pl-smi">$_GET</span>[<span class="pl-s"><span class="pl-pds">&#39;</span>taskCatID<span class="pl-pds">&#39;</span></span>]);</span></td>
      </tr>
      <tr>
        <td id="L11" class="blob-num js-line-number" data-line-number="11"></td>
        <td id="LC11" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">	</span></td>
      </tr>
      <tr>
        <td id="L12" class="blob-num js-line-number" data-line-number="12"></td>
        <td id="LC12" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">	<span class="pl-smi">$sql</span> <span class="pl-k">=</span> <span class="pl-s"><span class="pl-pds">&quot;</span><span class="pl-s1"><span class="pl-k">SELECT</span> description <span class="pl-k">FROM</span> TaskCategory <span class="pl-k">WHERE</span> task_category_id <span class="pl-k">=</span> <span class="pl-s">&#39;</span></span><span class="pl-pds">&quot;</span></span> <span class="pl-k">.</span> <span class="pl-smi">$selected</span> <span class="pl-k">.</span> <span class="pl-s"><span class="pl-pds">&quot;</span>&#39;<span class="pl-pds">&quot;</span></span>;</span></td>
      </tr>
      <tr>
        <td id="L13" class="blob-num js-line-number" data-line-number="13"></td>
        <td id="LC13" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">	<span class="pl-smi">$result</span> <span class="pl-k">=</span> <span class="pl-c1">mysqli_query</span>(<span class="pl-smi">$conn</span>, <span class="pl-smi">$sql</span>);</span></td>
      </tr>
      <tr>
        <td id="L14" class="blob-num js-line-number" data-line-number="14"></td>
        <td id="LC14" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">	<span class="pl-smi">$arow</span> <span class="pl-k">=</span> <span class="pl-c1">mysqli_fetch_row</span>(<span class="pl-smi">$result</span>);</span></td>
      </tr>
      <tr>
        <td id="L15" class="blob-num js-line-number" data-line-number="15"></td>
        <td id="LC15" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"></span></td>
      </tr>
      <tr>
        <td id="L16" class="blob-num js-line-number" data-line-number="16"></td>
        <td id="LC16" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">	<span class="pl-k">if</span> (<span class="pl-smi">$selected</span> <span class="pl-k">===</span> <span class="pl-c1">0</span>) {</span></td>
      </tr>
      <tr>
        <td id="L17" class="blob-num js-line-number" data-line-number="17"></td>
        <td id="LC17" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">		<span class="pl-c1">echo</span> <span class="pl-s"><span class="pl-pds">&quot;</span>&lt;h2&gt;All Tasks&lt;/h2&gt;<span class="pl-pds">&quot;</span></span>;</span></td>
      </tr>
      <tr>
        <td id="L18" class="blob-num js-line-number" data-line-number="18"></td>
        <td id="LC18" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">		<span class="pl-smi">$sql</span> <span class="pl-k">=</span> <span class="pl-s"><span class="pl-pds">&quot;</span><span class="pl-s1"><span class="pl-k">SELECT</span> <span class="pl-c1">t</span>.<span class="pl-c1">task_id</span>, <span class="pl-c1">tc</span>.<span class="pl-c1">description</span> <span class="pl-k">as</span> tcdescription, <span class="pl-c1">t</span>.<span class="pl-c1">description</span>, <span class="pl-c1">t</span>.<span class="pl-c1">task_category_id</span>, <span class="pl-c1">t</span>.<span class="pl-c1">date_time_start</span>, <span class="pl-c1">t</span>.<span class="pl-c1">date_time_end</span>, <span class="pl-c1">tes</span>.<span class="pl-c1">status</span> <span class="pl-k">FROM</span> Task <span class="pl-k">as</span> t</span></span></span></td>
      </tr>
      <tr>
        <td id="L19" class="blob-num js-line-number" data-line-number="19"></td>
        <td id="LC19" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"><span class="pl-s"><span class="pl-s1">			<span class="pl-k">JOIN</span> taskcategory <span class="pl-k">as</span> tc <span class="pl-k">ON</span> <span class="pl-c1">t</span>.<span class="pl-c1">task_category_id</span> <span class="pl-k">=</span> <span class="pl-c1">tc</span>.<span class="pl-c1">task_category_id</span></span></span></span></td>
      </tr>
      <tr>
        <td id="L20" class="blob-num js-line-number" data-line-number="20"></td>
        <td id="LC20" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"><span class="pl-s"><span class="pl-s1">			<span class="pl-k">JOIN</span> TaskEventStatus <span class="pl-k">as</span> tes <span class="pl-k">ON</span> <span class="pl-c1">t</span>.<span class="pl-c1">task_event_status_id</span> <span class="pl-k">=</span> <span class="pl-c1">tes</span>.<span class="pl-c1">task_event_status_id</span></span></span></span></td>
      </tr>
      <tr>
        <td id="L21" class="blob-num js-line-number" data-line-number="21"></td>
        <td id="LC21" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"><span class="pl-s"><span class="pl-s1">			<span class="pl-k">WHERE</span> <span class="pl-c1">t</span>.<span class="pl-c1">task_event_status_id</span> <span class="pl-k">!=</span> <span class="pl-c1">4</span></span><span class="pl-pds">&quot;</span></span>;</span></td>
      </tr>
      <tr>
        <td id="L22" class="blob-num js-line-number" data-line-number="22"></td>
        <td id="LC22" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">	} <span class="pl-k">else</span> {</span></td>
      </tr>
      <tr>
        <td id="L23" class="blob-num js-line-number" data-line-number="23"></td>
        <td id="LC23" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">		<span class="pl-c1">echo</span> <span class="pl-s"><span class="pl-pds">&quot;</span>&lt;h2&gt;<span class="pl-smi">$arow</span>[<span class="pl-c1">0</span>]&lt;/h2&gt;<span class="pl-pds">&quot;</span></span>;</span></td>
      </tr>
      <tr>
        <td id="L24" class="blob-num js-line-number" data-line-number="24"></td>
        <td id="LC24" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">		<span class="pl-smi">$sql</span> <span class="pl-k">=</span> <span class="pl-s"><span class="pl-pds">&quot;</span><span class="pl-s1"><span class="pl-k">SELECT</span> <span class="pl-c1">t</span>.<span class="pl-c1">task_id</span>, <span class="pl-c1">tc</span>.<span class="pl-c1">description</span> <span class="pl-k">as</span> tcdescription, <span class="pl-c1">t</span>.<span class="pl-c1">description</span>, <span class="pl-c1">t</span>.<span class="pl-c1">task_category_id</span>, <span class="pl-c1">t</span>.<span class="pl-c1">date_time_start</span>, <span class="pl-c1">t</span>.<span class="pl-c1">date_time_end</span>, <span class="pl-c1">tes</span>.<span class="pl-c1">status</span> <span class="pl-k">FROM</span> Task <span class="pl-k">as</span> t</span></span></span></td>
      </tr>
      <tr>
        <td id="L25" class="blob-num js-line-number" data-line-number="25"></td>
        <td id="LC25" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"><span class="pl-s"><span class="pl-s1">			<span class="pl-k">JOIN</span> taskcategory <span class="pl-k">as</span> tc <span class="pl-k">ON</span> <span class="pl-c1">t</span>.<span class="pl-c1">task_category_id</span> <span class="pl-k">=</span> <span class="pl-c1">tc</span>.<span class="pl-c1">task_category_id</span></span></span></span></td>
      </tr>
      <tr>
        <td id="L26" class="blob-num js-line-number" data-line-number="26"></td>
        <td id="LC26" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"><span class="pl-s"><span class="pl-s1">			<span class="pl-k">JOIN</span> TaskEventStatus <span class="pl-k">as</span> tes <span class="pl-k">ON</span> <span class="pl-c1">t</span>.<span class="pl-c1">task_event_status_id</span> <span class="pl-k">=</span> <span class="pl-c1">tes</span>.<span class="pl-c1">task_event_status_id</span></span></span></span></td>
      </tr>
      <tr>
        <td id="L27" class="blob-num js-line-number" data-line-number="27"></td>
        <td id="LC27" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"><span class="pl-s"><span class="pl-s1">			<span class="pl-k">WHERE</span> <span class="pl-c1">t</span>.<span class="pl-c1">task_category_id</span> <span class="pl-k">=</span> <span class="pl-s">&#39;</span></span><span class="pl-pds">&quot;</span></span> <span class="pl-k">.</span> <span class="pl-smi">$selected</span> <span class="pl-k">.</span> <span class="pl-s"><span class="pl-pds">&quot;</span>&#39; AND t.task_event_status_id != 4<span class="pl-pds">&quot;</span></span>;</span></td>
      </tr>
      <tr>
        <td id="L28" class="blob-num js-line-number" data-line-number="28"></td>
        <td id="LC28" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">	}</span></td>
      </tr>
      <tr>
        <td id="L29" class="blob-num js-line-number" data-line-number="29"></td>
        <td id="LC29" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">	</span></td>
      </tr>
      <tr>
        <td id="L30" class="blob-num js-line-number" data-line-number="30"></td>
        <td id="LC30" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">	<span class="pl-smi">$result</span> <span class="pl-k">=</span> <span class="pl-smi">$conn</span><span class="pl-k">-&gt;</span>query(<span class="pl-smi">$sql</span>);</span></td>
      </tr>
      <tr>
        <td id="L31" class="blob-num js-line-number" data-line-number="31"></td>
        <td id="LC31" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"></span></td>
      </tr>
      <tr>
        <td id="L32" class="blob-num js-line-number" data-line-number="32"></td>
        <td id="LC32" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">	<span class="pl-k">if</span> (<span class="pl-smi">$result</span><span class="pl-k">-&gt;</span><span class="pl-smi">num_rows</span> <span class="pl-k">&gt;</span> <span class="pl-c1">0</span>) {</span></td>
      </tr>
      <tr>
        <td id="L33" class="blob-num js-line-number" data-line-number="33"></td>
        <td id="LC33" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">		</span></td>
      </tr>
      <tr>
        <td id="L34" class="blob-num js-line-number" data-line-number="34"></td>
        <td id="LC34" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">		<span class="pl-c1">echo</span> <span class="pl-s"><span class="pl-pds">&quot;</span>&lt;table id=&#39;tableTasks&#39; class=&#39;table table-hover&#39;&gt;</span></span></td>
      </tr>
      <tr>
        <td id="L35" class="blob-num js-line-number" data-line-number="35"></td>
        <td id="LC35" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"><span class="pl-s">					&lt;tr&gt;</span></span></td>
      </tr>
      <tr>
        <td id="L36" class="blob-num js-line-number" data-line-number="36"></td>
        <td id="LC36" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"><span class="pl-s">						&lt;td width=&#39;1%&#39;&gt;&lt;strong&gt;&lt;input id=&#39;checkSelectAll&#39; type=&#39;checkbox&#39; value=&#39;All&#39; onchange=&#39;checkAll()&#39;&gt;&lt;/strong&gt;&lt;/td&gt;</span></span></td>
      </tr>
      <tr>
        <td id="L37" class="blob-num js-line-number" data-line-number="37"></td>
        <td id="LC37" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"><span class="pl-s">						&lt;td width=&#39;4%&#39;&gt;&lt;strong&gt;Task Number&lt;/strong&gt;&lt;/td&gt;</span></span></td>
      </tr>
      <tr>
        <td id="L38" class="blob-num js-line-number" data-line-number="38"></td>
        <td id="LC38" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"><span class="pl-s">						&lt;td width=&#39;10%&#39;&gt;&lt;strong&gt;Task Category&lt;/strong&gt;&lt;/td&gt;</span></span></td>
      </tr>
      <tr>
        <td id="L39" class="blob-num js-line-number" data-line-number="39"></td>
        <td id="LC39" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"><span class="pl-s">						&lt;td width=&#39;20%&#39;&gt;&lt;strong&gt;Task Description&lt;/strong&gt;&lt;/td&gt;</span></span></td>
      </tr>
      <tr>
        <td id="L40" class="blob-num js-line-number" data-line-number="40"></td>
        <td id="LC40" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"><span class="pl-s">						&lt;td width=&#39;10%&#39;&gt;&lt;strong&gt;Start Date&lt;/strong&gt;&lt;/td&gt;</span></span></td>
      </tr>
      <tr>
        <td id="L41" class="blob-num js-line-number" data-line-number="41"></td>
        <td id="LC41" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"><span class="pl-s">						&lt;td width=&#39;10%&#39;&gt;&lt;strong&gt;Finish Date&lt;/strong&gt;&lt;/td&gt;</span></span></td>
      </tr>
      <tr>
        <td id="L42" class="blob-num js-line-number" data-line-number="42"></td>
        <td id="LC42" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"><span class="pl-s">						&lt;td width=&#39;4%&#39;&gt;&lt;strong&gt;Status&lt;/strong&gt;&lt;/td&gt;</span></span></td>
      </tr>
      <tr>
        <td id="L43" class="blob-num js-line-number" data-line-number="43"></td>
        <td id="LC43" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"><span class="pl-s">						&lt;td width=&#39;5%&#39;&gt;&lt;strong&gt;Options&lt;/strong&gt;&lt;/td&gt;</span></span></td>
      </tr>
      <tr>
        <td id="L44" class="blob-num js-line-number" data-line-number="44"></td>
        <td id="LC44" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"><span class="pl-s">					&lt;tr&gt;<span class="pl-pds">&quot;</span></span>;</span></td>
      </tr>
      <tr>
        <td id="L45" class="blob-num js-line-number" data-line-number="45"></td>
        <td id="LC45" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">		</span></td>
      </tr>
      <tr>
        <td id="L46" class="blob-num js-line-number" data-line-number="46"></td>
        <td id="LC46" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">		<span class="pl-k">while</span>(<span class="pl-smi">$row</span> <span class="pl-k">=</span> <span class="pl-smi">$result</span><span class="pl-k">-&gt;</span>fetch_assoc()) {</span></td>
      </tr>
      <tr>
        <td id="L47" class="blob-num js-line-number" data-line-number="47"></td>
        <td id="LC47" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">			<span class="pl-smi">$start_date</span> <span class="pl-k">=</span> <span class="pl-c1">date_create</span>(<span class="pl-smi">$row</span>[<span class="pl-s"><span class="pl-pds">&#39;</span>date_time_start<span class="pl-pds">&#39;</span></span>], <span class="pl-c1">timezone_open</span>(<span class="pl-s"><span class="pl-pds">&quot;</span>Australia/Sydney<span class="pl-pds">&quot;</span></span>));</span></td>
      </tr>
      <tr>
        <td id="L48" class="blob-num js-line-number" data-line-number="48"></td>
        <td id="LC48" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">			<span class="pl-smi">$end_date</span> <span class="pl-k">=</span> <span class="pl-c1">date_create</span>(<span class="pl-smi">$row</span>[<span class="pl-s"><span class="pl-pds">&#39;</span>date_time_end<span class="pl-pds">&#39;</span></span>], <span class="pl-c1">timezone_open</span>(<span class="pl-s"><span class="pl-pds">&quot;</span>Australia/Sydney<span class="pl-pds">&quot;</span></span>));</span></td>
      </tr>
      <tr>
        <td id="L49" class="blob-num js-line-number" data-line-number="49"></td>
        <td id="LC49" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">			</span></td>
      </tr>
      <tr>
        <td id="L50" class="blob-num js-line-number" data-line-number="50"></td>
        <td id="LC50" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">			<span class="pl-c1">echo</span> <span class="pl-s"><span class="pl-pds">&quot;</span>&lt;tr&gt;</span></span></td>
      </tr>
      <tr>
        <td id="L51" class="blob-num js-line-number" data-line-number="51"></td>
        <td id="LC51" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"><span class="pl-s">					&lt;td width=&#39;1%&#39;&gt;&lt;label&gt;&lt;input class=&#39;checkSelect&#39; type=&#39;checkbox&#39; value=&#39;<span class="pl-pds">&quot;</span></span> <span class="pl-k">.</span> <span class="pl-smi">$row</span>[<span class="pl-s"><span class="pl-pds">&#39;</span>task_id<span class="pl-pds">&#39;</span></span>] <span class="pl-k">.</span> <span class="pl-s"><span class="pl-pds">&quot;</span>&#39;&gt;&lt;/label&gt;&lt;/td&gt;</span></span></td>
      </tr>
      <tr>
        <td id="L52" class="blob-num js-line-number" data-line-number="52"></td>
        <td id="LC52" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"><span class="pl-s">					&lt;td width=&#39;4%&#39;&gt;&lt;p&gt;Task <span class="pl-pds">&quot;</span></span> <span class="pl-k">.</span> <span class="pl-smi">$row</span>[<span class="pl-s"><span class="pl-pds">&#39;</span>task_id<span class="pl-pds">&#39;</span></span>] <span class="pl-k">.</span>  <span class="pl-s"><span class="pl-pds">&quot;</span>&lt;/p&gt;&lt;/td&gt;</span></span></td>
      </tr>
      <tr>
        <td id="L53" class="blob-num js-line-number" data-line-number="53"></td>
        <td id="LC53" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"><span class="pl-s">					&lt;td width=&#39;10%&#39;&gt;&lt;p&gt;<span class="pl-pds">&quot;</span></span> <span class="pl-k">.</span> <span class="pl-smi">$row</span>[<span class="pl-s"><span class="pl-pds">&#39;</span>tcdescription<span class="pl-pds">&#39;</span></span>] <span class="pl-k">.</span> <span class="pl-s"><span class="pl-pds">&quot;</span>&lt;/p&gt;&lt;/td&gt;</span></span></td>
      </tr>
      <tr>
        <td id="L54" class="blob-num js-line-number" data-line-number="54"></td>
        <td id="LC54" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"><span class="pl-s">					&lt;td width=&#39;20%&#39;&gt;&lt;p&gt;<span class="pl-pds">&quot;</span></span> <span class="pl-k">.</span> <span class="pl-smi">$row</span>[<span class="pl-s"><span class="pl-pds">&#39;</span>description<span class="pl-pds">&#39;</span></span>] <span class="pl-k">.</span> <span class="pl-s"><span class="pl-pds">&quot;</span>&lt;/p&gt;&lt;/td&gt;</span></span></td>
      </tr>
      <tr>
        <td id="L55" class="blob-num js-line-number" data-line-number="55"></td>
        <td id="LC55" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"><span class="pl-s">					&lt;td width=&#39;10%&#39;&gt;&lt;p&gt;<span class="pl-pds">&quot;</span></span> <span class="pl-k">.</span> <span class="pl-c1">date_format</span>(<span class="pl-smi">$start_date</span>, <span class="pl-s"><span class="pl-pds">&#39;</span>l jS F Y h:i a<span class="pl-pds">&#39;</span></span>) <span class="pl-k">.</span> <span class="pl-s"><span class="pl-pds">&quot;</span>&lt;/p&gt;&lt;/td&gt;</span></span></td>
      </tr>
      <tr>
        <td id="L56" class="blob-num js-line-number" data-line-number="56"></td>
        <td id="LC56" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"><span class="pl-s">					&lt;td width=&#39;10%&#39;&gt;&lt;p&gt;<span class="pl-pds">&quot;</span></span> <span class="pl-k">.</span> <span class="pl-c1">date_format</span>(<span class="pl-smi">$end_date</span>, <span class="pl-s"><span class="pl-pds">&#39;</span>l jS F Y h:i a<span class="pl-pds">&#39;</span></span>) <span class="pl-k">.</span> <span class="pl-s"><span class="pl-pds">&quot;</span>&lt;/p&gt;&lt;/td&gt;</span></span></td>
      </tr>
      <tr>
        <td id="L57" class="blob-num js-line-number" data-line-number="57"></td>
        <td id="LC57" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"><span class="pl-s">					&lt;td width=&#39;4%&#39;&gt;&lt;p&gt;<span class="pl-pds">&quot;</span></span> <span class="pl-k">.</span> <span class="pl-smi">$row</span>[<span class="pl-s"><span class="pl-pds">&#39;</span>status<span class="pl-pds">&#39;</span></span>] <span class="pl-k">.</span> <span class="pl-s"><span class="pl-pds">&quot;</span>&lt;/p&gt;&lt;/td&gt;</span></span></td>
      </tr>
      <tr>
        <td id="L58" class="blob-num js-line-number" data-line-number="58"></td>
        <td id="LC58" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"><span class="pl-s">					&lt;td width=&#39;5%&#39;&gt;&lt;p&gt;&lt;a href=&#39;#&#39;<span class="pl-pds">&quot;</span></span> <span class="pl-k">.</span> <span class="pl-smi">$row</span>[<span class="pl-s"><span class="pl-pds">&#39;</span>task_id<span class="pl-pds">&#39;</span></span>] <span class="pl-k">.</span> <span class="pl-s"><span class="pl-pds">&quot;</span> title=&#39;<span class="pl-pds">&quot;</span></span>  <span class="pl-k">.</span> <span class="pl-smi">$row</span>[<span class="pl-s"><span class="pl-pds">&#39;</span>task_id<span class="pl-pds">&#39;</span></span>] <span class="pl-k">.</span> <span class="pl-s"><span class="pl-pds">&quot;</span>&#39; onclick=&#39;showTaskDetails(this.title)&#39;&gt;&lt;span class=&#39;glyphicon glyphicon-search&#39;&gt;&lt;/span&gt;&lt;/a&gt;</span></span></td>
      </tr>
      <tr>
        <td id="L59" class="blob-num js-line-number" data-line-number="59"></td>
        <td id="LC59" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"><span class="pl-s">							&lt;a href=&#39;#&#39;<span class="pl-pds">&quot;</span></span> <span class="pl-k">.</span> <span class="pl-smi">$row</span>[<span class="pl-s"><span class="pl-pds">&#39;</span>task_id<span class="pl-pds">&#39;</span></span>] <span class="pl-k">.</span> <span class="pl-s"><span class="pl-pds">&quot;</span> title=&#39;<span class="pl-pds">&quot;</span></span>  <span class="pl-k">.</span> <span class="pl-smi">$row</span>[<span class="pl-s"><span class="pl-pds">&#39;</span>task_id<span class="pl-pds">&#39;</span></span>] <span class="pl-k">.</span> <span class="pl-s"><span class="pl-pds">&quot;</span>&#39; onclick=&#39;showEditTaskModal(this.title)&#39;&gt;&lt;span class=&#39;glyphicon glyphicon-pencil&#39;&gt;&lt;/span&gt;&lt;/a&gt;</span></span></td>
      </tr>
      <tr>
        <td id="L60" class="blob-num js-line-number" data-line-number="60"></td>
        <td id="LC60" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"><span class="pl-s">							&lt;a href=&#39;#&#39;<span class="pl-pds">&quot;</span></span> <span class="pl-k">.</span> <span class="pl-smi">$row</span>[<span class="pl-s"><span class="pl-pds">&#39;</span>task_id<span class="pl-pds">&#39;</span></span>] <span class="pl-k">.</span> <span class="pl-s"><span class="pl-pds">&quot;</span> title=&#39;<span class="pl-pds">&quot;</span></span>  <span class="pl-k">.</span> <span class="pl-smi">$row</span>[<span class="pl-s"><span class="pl-pds">&#39;</span>task_id<span class="pl-pds">&#39;</span></span>] <span class="pl-k">.</span> <span class="pl-s"><span class="pl-pds">&quot;</span>&#39; onclick=&#39;showDeleteTaskModal(this.title)&#39;&gt;&lt;span class=&#39;glyphicon glyphicon-trash&#39;&gt;&lt;/span&gt;&lt;/a&gt;&lt;/p&gt;&lt;/td&gt;</span></span></td>
      </tr>
      <tr>
        <td id="L61" class="blob-num js-line-number" data-line-number="61"></td>
        <td id="LC61" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"><span class="pl-s">					&lt;/tr&gt;<span class="pl-pds">&quot;</span></span>;</span></td>
      </tr>
      <tr>
        <td id="L62" class="blob-num js-line-number" data-line-number="62"></td>
        <td id="LC62" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">		}</span></td>
      </tr>
      <tr>
        <td id="L63" class="blob-num js-line-number" data-line-number="63"></td>
        <td id="LC63" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">		<span class="pl-c1">echo</span> <span class="pl-s"><span class="pl-pds">&quot;</span>&lt;/table&gt;<span class="pl-pds">&quot;</span></span>;</span></td>
      </tr>
      <tr>
        <td id="L64" class="blob-num js-line-number" data-line-number="64"></td>
        <td id="LC64" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">		</span></td>
      </tr>
      <tr>
        <td id="L65" class="blob-num js-line-number" data-line-number="65"></td>
        <td id="LC65" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">	} <span class="pl-k">else</span> {</span></td>
      </tr>
      <tr>
        <td id="L66" class="blob-num js-line-number" data-line-number="66"></td>
        <td id="LC66" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">		<span class="pl-c1">echo</span> <span class="pl-s"><span class="pl-pds">&quot;</span>No tasks found.<span class="pl-pds">&quot;</span></span>;</span></td>
      </tr>
      <tr>
        <td id="L67" class="blob-num js-line-number" data-line-number="67"></td>
        <td id="LC67" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">	}</span></td>
      </tr>
      <tr>
        <td id="L68" class="blob-num js-line-number" data-line-number="68"></td>
        <td id="LC68" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">	</span></td>
      </tr>
      <tr>
        <td id="L69" class="blob-num js-line-number" data-line-number="69"></td>
        <td id="LC69" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">	<span class="pl-smi">$conn</span><span class="pl-k">-&gt;</span>close();</span></td>
      </tr>
      <tr>
        <td id="L70" class="blob-num js-line-number" data-line-number="70"></td>
        <td id="LC70" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"></span><span class="pl-pse"><span class="pl-s1">?</span>&gt;</span></td>
      </tr>
</table>

  </div>

</div>

<button type="button" data-facebox="#jump-to-line" data-facebox-class="linejump" data-hotkey="l" class="d-none">Jump to Line</button>
<div id="jump-to-line" style="display:none">
  <!-- '"` --><!-- </textarea></xmp> --></option></form><form accept-charset="UTF-8" action="" class="js-jump-to-line-form" method="get"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /></div>
    <input class="form-control linejump-input js-jump-to-line-field" type="text" placeholder="Jump to line&hellip;" aria-label="Jump to line" autofocus>
    <button type="submit" class="btn">Go</button>
</form></div>

  </div>
  <div class="modal-backdrop js-touch-events"></div>
</div>


    </div>
  </div>

    </div>

        <div class="container site-footer-container">
  <div class="site-footer" role="contentinfo">
    <ul class="site-footer-links float-right">
        <li><a href="https://github.com/contact" data-ga-click="Footer, go to contact, text:contact">Contact GitHub</a></li>
      <li><a href="https://developer.github.com" data-ga-click="Footer, go to api, text:api">API</a></li>
      <li><a href="https://training.github.com" data-ga-click="Footer, go to training, text:training">Training</a></li>
      <li><a href="https://shop.github.com" data-ga-click="Footer, go to shop, text:shop">Shop</a></li>
        <li><a href="https://github.com/blog" data-ga-click="Footer, go to blog, text:blog">Blog</a></li>
        <li><a href="https://github.com/about" data-ga-click="Footer, go to about, text:about">About</a></li>

    </ul>

    <a href="https://github.com" aria-label="Homepage" class="site-footer-mark" title="GitHub">
      <svg aria-hidden="true" class="octicon octicon-mark-github" height="24" version="1.1" viewBox="0 0 16 16" width="24"><path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0 0 16 8c0-4.42-3.58-8-8-8z"></path></svg>
</a>
    <ul class="site-footer-links">
      <li>&copy; 2016 <span title="0.10183s from github-fe125-cp1-prd.iad.github.net">GitHub</span>, Inc.</li>
        <li><a href="https://github.com/site/terms" data-ga-click="Footer, go to terms, text:terms">Terms</a></li>
        <li><a href="https://github.com/site/privacy" data-ga-click="Footer, go to privacy, text:privacy">Privacy</a></li>
        <li><a href="https://github.com/security" data-ga-click="Footer, go to security, text:security">Security</a></li>
        <li><a href="https://status.github.com/" data-ga-click="Footer, go to status, text:status">Status</a></li>
        <li><a href="https://help.github.com" data-ga-click="Footer, go to help, text:help">Help</a></li>
    </ul>
  </div>
</div>



    

    <div id="ajax-error-message" class="ajax-error-message flash flash-error">
      <svg aria-hidden="true" class="octicon octicon-alert" height="16" version="1.1" viewBox="0 0 16 16" width="16"><path d="M8.865 1.52c-.18-.31-.51-.5-.87-.5s-.69.19-.87.5L.275 13.5c-.18.31-.18.69 0 1 .19.31.52.5.87.5h13.7c.36 0 .69-.19.86-.5.17-.31.18-.69.01-1L8.865 1.52zM8.995 13h-2v-2h2v2zm0-3h-2V6h2v4z"></path></svg>
      <button type="button" class="flash-close js-flash-close js-ajax-error-dismiss" aria-label="Dismiss error">
        <svg aria-hidden="true" class="octicon octicon-x" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48z"></path></svg>
      </button>
      You can't perform that action at this time.
    </div>


      
      <script crossorigin="anonymous" integrity="sha256-ag2yCS6kaZCq8nDa5FweQdSGGjNryiKHSEzXglBRRqA=" src="https://assets-cdn.github.com/assets/frameworks-6a0db2092ea46990aaf270dae45c1e41d4861a336bca2287484cd782505146a0.js"></script>
      <script async="async" crossorigin="anonymous" integrity="sha256-FEozLq0l0Xt/yjoy8SAZRP2WLzCjdIbMy8qk8SmwOBk=" src="https://assets-cdn.github.com/assets/github-144a332ead25d17b7fca3a32f1201944fd962f30a37486cccbcaa4f129b03819.js"></script>
      
      
      
      
      
      
    <div class="js-stale-session-flash stale-session-flash flash flash-warn flash-banner d-none">
      <svg aria-hidden="true" class="octicon octicon-alert" height="16" version="1.1" viewBox="0 0 16 16" width="16"><path d="M8.865 1.52c-.18-.31-.51-.5-.87-.5s-.69.19-.87.5L.275 13.5c-.18.31-.18.69 0 1 .19.31.52.5.87.5h13.7c.36 0 .69-.19.86-.5.17-.31.18-.69.01-1L8.865 1.52zM8.995 13h-2v-2h2v2zm0-3h-2V6h2v4z"></path></svg>
      <span class="signed-in-tab-flash">You signed in with another tab or window. <a href="">Reload</a> to refresh your session.</span>
      <span class="signed-out-tab-flash">You signed out in another tab or window. <a href="">Reload</a> to refresh your session.</span>
    </div>
    <div class="facebox" id="facebox" style="display:none;">
  <div class="facebox-popup">
    <div class="facebox-content" role="dialog" aria-labelledby="facebox-header" aria-describedby="facebox-description">
    </div>
    <button type="button" class="facebox-close js-facebox-close" aria-label="Close modal">
      <svg aria-hidden="true" class="octicon octicon-x" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48z"></path></svg>
    </button>
  </div>
</div>

  </body>
</html>

