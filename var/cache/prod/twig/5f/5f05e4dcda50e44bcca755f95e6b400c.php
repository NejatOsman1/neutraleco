<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* @Cms/login/login.html.twig */
class __TwigTemplate_c8cb2bac4ff7bf61d81a8cfa53045647 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body' => [$this, 'block_body'],
            'bgimage' => [$this, 'block_bgimage'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "@Cms/interface_light.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@Cms/interface_light.html.twig", "@Cms/login/login.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "
    <style>
    .snake-bg {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: #0000009c;
    }
    canvas#viewport {
      position: fixed;
      top: 50%;
      margin-top: -240px;
      left: 50%;
      margin-left: -320px;
      z-index: 1000;
    }
    div#score {
      position: fixed;
      z-index: 10000;
      color: #fff;
      font-weight: bold;
      font-size: 70px;
      margin-top: 40px;
      text-align: center;
      left: 0;
      right: 0;
    }
    </style>

    <div class=\"login-page ";
        // line 36
        if (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "hasBackground", [], "any", false, false, false, 36)) {
            echo "has-bg";
        }
        echo "\">
      ";
        // line 37
        if (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "hasBackground", [], "any", false, false, false, 37)) {
            echo "<div class=\"login-bg\" style=\"";
            $this->displayBlock('bgimage', $context, $blocks);
            echo "\"></div>";
        }
        // line 38
        echo "
      <div class=\"logobox\">
        <img src=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/images/logo.svg"), "html", null, true);
        echo "\"/>
      </div>

      <div class=\"vtable\">
        <div class=\"vcell\">
          <div class=\"window\">
            <form id=\"login-form\" action=\"";
        // line 46
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_login_check");
        echo "\"=\"admin_login_check\" )=\")\" }}\"\"=\"}}\" \"\" method=\"post\">
              <div class=\"row mb-3\">
                <h3>";
        // line 48
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Inloggen", [], "login");
        echo "</h3>
              </div>

              <div class=\"alert alert-warning d-lg-none\" role=\"alert\">
                <b>Let op!</b> De huidige resolutie wordt beperkt ondersteund. Sommige functies kunnen mogelijk niet naar behoren functioneren.
              </div>

              <div class=\"row mb-2\">
                <div class=\"col-12\">
                  <div class=\"field\">
                    <input id=\"field-username\" class=\"form-control form-control-lg\" autocomplete=\"off\" type=\"text\" name=\"_username\" value=\"";
        // line 58
        echo twig_escape_filter($this->env, ($context["last_username"] ?? null), "html", null, true);
        echo "\" placeholder=\"";
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Gebruikersnaam", [], "login");
        echo "\">
                    <i class=\"fa fa-user\"></i>
                  </div>
                </div>
              </div>

              <div class=\"row mb-3\">
                <div class=\"col-12\">
                  <div class=\"field \">
                    <input id=\"field-password\" class=\"form-control form-control-lg\" autocomplete=\"off\" type=\"password\" name=\"_password\" placeholder=\"";
        // line 67
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wachtwoord", [], "login");
        echo "\">
                    <i class=\"fa fa-lock\"></i>
                  </div>
                </div>
              </div>

              <div class=\"row my-3 align-items-center\">
                <div class=\"field\">
                  <button type=\"submit\" class=\"btn btn-lg w-100\">
                    <span id=\"btn-text\">";
        // line 76
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Inloggen", [], "login");
        echo "</span>
                  </button>
                </div>
              </div>

              <small class=\"text-center\">
                <a href=\"";
        // line 82
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_lostpassword");
        echo "\" class=\"lost-password\">";
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wachtwoord vergeten?", [], "login");
        echo "</a>
              </small>

              <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 85
        echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("authenticate"), "html", null, true);
        echo "\">
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class=\"footer\">
      <span class=\"powered-by\">
        <a href=\"";
        // line 94
        echo twig_escape_filter($this->env, ($context["trinity_url"] ?? null), "html", null, true);
        echo "\" target=\"blank\">";
        echo twig_escape_filter($this->env, ($context["trinity"] ?? null), "html", null, true);
        echo "
          <span>v";
        // line 95
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "</span></a>
      </span>
      <span>
        <a href=\"";
        // line 98
        echo twig_escape_filter($this->env, ($context["company_url"] ?? null), "html", null, true);
        echo "\" target=\"blank\">";
        echo twig_escape_filter($this->env, ($context["company"] ?? null), "html", null, true);
        echo "
          &copy;
          ";
        // line 100
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo "</a>
      </span>
    </div>

    ";
        // line 108
        echo "
<script>
// ------------------------------------------------------------
// Creating A Snake Game Tutorial With HTML5
// Copyright (c) 2015 Rembound.com
//
// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program.  If not, see http://www.gnu.org/licenses/.
//
// http://rembound.com/articles/creating-a-snake-game-tutorial-with-html5
// ------------------------------------------------------------

// The function gets called when the window is fully loaded
window.onload = function() {
    // Get the canvas and context
    var canvas = document.getElementById(\"viewport\");
    var context = canvas.getContext(\"2d\");

    // Timing and frames per second
    var lastframe = 0;
    var fpstime = 0;
    var framecount = 0;
    var fps = 0;

    var initialized = false;

    // Images
    var images = [];
    var tileimage;

    // Image loading global variables
    var loadcount = 0;
    var loadtotal = 0;
    var preloaded = false;

    // Load images
    function loadImages(imagefiles) {
        // Initialize variables
        loadcount = 0;
        loadtotal = imagefiles.length;
        preloaded = false;

        // Load the images
        var loadedimages = [];
        for (var i=0; i<imagefiles.length; i++) {
            // Create the image object
            var image = new Image();

            // Add onload event handler
            image.onload = function () {
                loadcount++;
                if (loadcount == loadtotal) {
                    // Done loading
                    preloaded = true;
                }
            };

            // Set the source url of the image
            image.src = imagefiles[i];

            // Save to the image array
            loadedimages[i] = image;
        }

        // Return an array of images
        return loadedimages;
    }

    // Level properties
    var Level = function (columns, rows, tilewidth, tileheight) {
        this.columns = columns;
        this.rows = rows;
        this.tilewidth = tilewidth;
        this.tileheight = tileheight;

        // Initialize tiles array
        this.tiles = [];
        for (var i=0; i<this.columns; i++) {
            this.tiles[i] = [];
            for (var j=0; j<this.rows; j++) {
                this.tiles[i][j] = 0;
            }
        }
    };

    // Generate a default level with walls
    Level.prototype.generate = function() {
        for (var i=0; i<this.columns; i++) {
            for (var j=0; j<this.rows; j++) {
                if (i == 0 || i == this.columns-1 ||
                    j == 0 || j == this.rows-1) {
                    // Add walls at the edges of the level
                    this.tiles[i][j] = 1;
                } else {
                    // Add empty space
                    this.tiles[i][j] = 0;
                }
            }
        }
    };


    // Snake
    var Snake = function() {
        this.init(0, 0, 1, 10, 1);
    }

    // Direction table: Up, Right, Down, Left
    Snake.prototype.directions = [[0, -1], [1, 0], [0, 1], [-1, 0]];

    // Initialize the snake at a location
    Snake.prototype.init = function(x, y, direction, speed, numsegments) {
        this.x = x;
        this.y = y;
        this.direction = direction; // Up, Right, Down, Left
        this.speed = speed;         // Movement speed in blocks per second
        this.movedelay = 0;

        // Reset the segments and add new ones
        this.segments = [];
        this.growsegments = 0;
        for (var i=0; i<numsegments; i++) {
            this.segments.push({x:this.x - i*this.directions[direction][0],
                                y:this.y - i*this.directions[direction][1]});
        }
    }

    // Increase the segment count
    Snake.prototype.grow = function() {
        this.growsegments++;
    };

    // Check we are allowed to move
    Snake.prototype.tryMove = function(dt) {
        this.movedelay += dt;
        var maxmovedelay = 1 / this.speed;
        if (this.movedelay > maxmovedelay) {
            return true;
        }
        return false;
    };

    // Get the position of the next move
    Snake.prototype.nextMove = function() {
        var nextx = this.x + this.directions[this.direction][0];
        var nexty = this.y + this.directions[this.direction][1];
        return {x:nextx, y:nexty};
    }

    // Move the snake in the direction
    Snake.prototype.move = function() {
        // Get the next move and modify the position
        var nextmove = this.nextMove();
        this.x = nextmove.x;
        this.y = nextmove.y;

        // Get the position of the last segment
        var lastseg = this.segments[this.segments.length-1];
        var growx = lastseg.x;
        var growy = lastseg.y;

        // Move segments to the position of the previous segment
        for (var i=this.segments.length-1; i>=1; i--) {
            this.segments[i].x = this.segments[i-1].x;
            this.segments[i].y = this.segments[i-1].y;
        }

        // Grow a segment if needed
        if (this.growsegments > 0) {
            this.segments.push({x:growx, y:growy});
            this.growsegments--;
        }

        // Move the first segment
        this.segments[0].x = this.x;
        this.segments[0].y = this.y;

        // Reset movedelay
        this.movedelay = 0;
    }

    // Create objects
    var snake = new Snake();
    var level = new Level(20, 15, 32, 32);

    // Variables
    var score = 0;              // Score
    var gameover = true;        // Game is over
    var gameovertime = 1;       // How long we have been game over
    var gameoverdelay = 0.5;    // Waiting time after game over

    function drawScore(){
      if(score >= 10){
        \$('#score').html('Aan t werk jung!');
      }else{
        \$('#score').html(score + ' / 10');
      }
    }

    // Initialize the game
    function init() {
        // Load images
        images = loadImages([\"/bundles/cms/snake-graphics.png\"]);
        tileimage = images[0];

        // Add mouse events
        canvas.addEventListener(\"mousedown\", onMouseDown);

        // Add keyboard events
        document.addEventListener(\"keydown\", onKeyDown);

        // New game
        newGame();
        gameover = true;

        // Enter main loop
        main(0);
    }

    // Check if we can start a new game
    function tryNewGame() {
        if (gameovertime > gameoverdelay) {
            newGame();
            gameover = false;
        }
    }

    function newGame() {
        // Initialize the snake
        snake.init(10, 10, 1, 10, 4);

        // Generate the default level
        level.generate();

        // Add an apple
        addApple();

        // Initialize the score
        score = 0;
        drawScore();

        // Initialize variables
        gameover = false;
    }

    // Add an apple to the level at an empty position
    function addApple() {
        // Loop until we have a valid apple
        var valid = false;
        while (!valid) {
            // Get a random position
            var ax = randRange(0, level.columns-1);
            var ay = randRange(0, level.rows-1);

            // Make sure the snake doesn't overlap the new apple
            var overlap = false;
            for (var i=0; i<snake.segments.length; i++) {
                // Get the position of the current snake segment
                var sx = snake.segments[i].x;
                var sy = snake.segments[i].y;

                // Check overlap
                if (ax == sx && ay == sy) {
                    overlap = true;
                    break;
                }
            }

            // Tile must be empty
            if (!overlap && level.tiles[ax][ay] == 0) {
                // Add an apple at the tile position
                level.tiles[ax][ay] = 2;
                valid = true;
            }
        }
    }

    // Main loop
    function main(tframe) {
        // Request animation frames
        window.requestAnimationFrame(main);

        if (!initialized) {
            // Preloader

            // Clear the canvas
            context.clearRect(0, 0, canvas.width, canvas.height);

            // Draw a progress bar
            var loadpercentage = loadcount/loadtotal;
            context.strokeStyle = \"#ff8080\";
            context.lineWidth=3;
            context.strokeRect(18.5, 0.5 + canvas.height - 51, canvas.width-37, 32);
            context.fillStyle = \"#ff8080\";
            context.fillRect(18.5, 0.5 + canvas.height - 51, loadpercentage*(canvas.width-37), 32);

            // Draw the progress text
            var loadtext = \"Loaded \" + loadcount + \"/\" + loadtotal + \" images\";
            context.fillStyle = \"#000000\";
            context.font = \"16px Verdana\";
            context.fillText(loadtext, 18, 0.5 + canvas.height - 63);

            if (preloaded) {
                initialized = true;
            }
        } else {
            // Update and render the game
            update(tframe);
            render();
        }
    }

    // Update the game state
    function update(tframe) {
        var dt = (tframe - lastframe) / 1000;
        lastframe = tframe;

        // Update the fps counter
        updateFps(dt);

        if (!gameover) {
            updateGame(dt);
        } else {
            gameovertime += dt;
        }
    }

    function updateGame(dt) {
        // Move the snake
        if (snake.tryMove(dt)) {
            // Check snake collisions

            // Get the coordinates of the next move
            var nextmove = snake.nextMove();
            var nx = nextmove.x;
            var ny = nextmove.y;

            if (nx >= 0 && nx < level.columns && ny >= 0 && ny < level.rows) {
                if (level.tiles[nx][ny] == 1) {
                    // Collision with a wall
                    gameover = true;
                }

                // Collisions with the snake itself
                for (var i=0; i<snake.segments.length; i++) {
                    var sx = snake.segments[i].x;
                    var sy = snake.segments[i].y;

                    if (nx == sx && ny == sy) {
                        // Found a snake part
                        gameover = true;
                        break;
                    }
                }

                if (!gameover) {
                    // The snake is allowed to move

                    // Move the snake
                    snake.move();

                    // Check collision with an apple
                    if (level.tiles[nx][ny] == 2) {
                        // Remove the apple
                        level.tiles[nx][ny] = 0;

                        // Add a new apple
                        addApple();

                        // Grow the snake
                        snake.grow();

                        // Add a point to the score
                        score++;
                        drawScore();
                    }


                }
            } else {
                // Out of bounds
                gameover = true;
            }

            if (gameover) {
                gameovertime = 0;
            }
        }
    }

    function updateFps(dt) {
        if (fpstime > 0.25) {
            // Calculate fps
            fps = Math.round(framecount / fpstime);

            // Reset time and framecount
            fpstime = 0;
            framecount = 0;
        }

        // Increase time and framecount
        fpstime += dt;
        framecount++;
    }

    // Render the game
    function render() {
        // Draw background
        context.fillStyle = \"#ff0000\";
        context.fillRect(0, 0, canvas.width, canvas.height);

        drawLevel();
        drawSnake();

        // Game over
        if (gameover) {
            context.fillStyle = \"rgba(0, 0, 0, 0.5)\";
            context.fillRect(0, 0, canvas.width, canvas.height);

            context.fillStyle = \"#ffffff\";
            context.font = \"24px Verdana\";
            drawCenterText(\"Drop op een knop om te starten!\", 0, canvas.height/2, canvas.width);
        }
    }

    // Draw the level tiles
    function drawLevel() {
        for (var i=0; i<level.columns; i++) {
            for (var j=0; j<level.rows; j++) {
                // Get the current tile and location
                var tile = level.tiles[i][j];
                var tilex = i*level.tilewidth;
                var tiley = j*level.tileheight;

                // Draw tiles based on their type
                if (tile == 0) {
                    // Empty space
                    context.fillStyle = \"#ffffff\";
                    context.fillRect(tilex, tiley, level.tilewidth, level.tileheight);
                } else if (tile == 1) {
                    // Wall
                    context.fillStyle = \"#11a2f4\";
                    context.fillRect(tilex, tiley, level.tilewidth, level.tileheight);
                } else if (tile == 2) {
                    // Apple

                    // Draw apple background
                    context.fillStyle = \"#ffffff\";
                    context.fillRect(tilex, tiley, level.tilewidth, level.tileheight);

                    // Draw the apple image
                    var tx = 0;
                    var ty = 3;
                    var tilew = 64;
                    var tileh = 64;
                    context.drawImage(tileimage, tx*tilew, ty*tileh, tilew, tileh, tilex, tiley, level.tilewidth, level.tileheight);
                }
            }
        }
    }

    // Draw the snake
    function drawSnake() {
        // Loop over every snake segment
        for (var i=0; i<snake.segments.length; i++) {
            var segment = snake.segments[i];
            var segx = segment.x;
            var segy = segment.y;
            var tilex = segx*level.tilewidth;
            var tiley = segy*level.tileheight;

            // Sprite column and row that gets calculated
            var tx = 0;
            var ty = 0;

            if (i == 0) {
                // Head; Determine the correct image
                var nseg = snake.segments[i+1]; // Next segment
                if (segy < nseg.y) {
                    // Up
                    tx = 3; ty = 0;
                } else if (segx > nseg.x) {
                    // Right
                    tx = 4; ty = 0;
                } else if (segy > nseg.y) {
                    // Down
                    tx = 4; ty = 1;
                } else if (segx < nseg.x) {
                    // Left
                    tx = 3; ty = 1;
                }
            } else if (i == snake.segments.length-1) {
                // Tail; Determine the correct image
                var pseg = snake.segments[i-1]; // Prev segment
                if (pseg.y < segy) {
                    // Up
                    tx = 3; ty = 2;
                } else if (pseg.x > segx) {
                    // Right
                    tx = 4; ty = 2;
                } else if (pseg.y > segy) {
                    // Down
                    tx = 4; ty = 3;
                } else if (pseg.x < segx) {
                    // Left
                    tx = 3; ty = 3;
                }
            } else {
                // Body; Determine the correct image
                var pseg = snake.segments[i-1]; // Previous segment
                var nseg = snake.segments[i+1]; // Next segment
                if (pseg.x < segx && nseg.x > segx || nseg.x < segx && pseg.x > segx) {
                    // Horizontal Left-Right
                    tx = 1; ty = 0;
                } else if (pseg.x < segx && nseg.y > segy || nseg.x < segx && pseg.y > segy) {
                    // Angle Left-Down
                    tx = 2; ty = 0;
                } else if (pseg.y < segy && nseg.y > segy || nseg.y < segy && pseg.y > segy) {
                    // Vertical Up-Down
                    tx = 2; ty = 1;
                } else if (pseg.y < segy && nseg.x < segx || nseg.y < segy && pseg.x < segx) {
                    // Angle Top-Left
                    tx = 2; ty = 2;
                } else if (pseg.x > segx && nseg.y < segy || nseg.x > segx && pseg.y < segy) {
                    // Angle Right-Up
                    tx = 0; ty = 1;
                } else if (pseg.y > segy && nseg.x > segx || nseg.y > segy && pseg.x > segx) {
                    // Angle Down-Right
                    tx = 0; ty = 0;
                }
            }

            // Draw the image of the snake part
            context.drawImage(tileimage, tx*64, ty*64, 64, 64, tilex, tiley,
                              level.tilewidth, level.tileheight);
        }
    }

    // Draw text that is centered
    function drawCenterText(text, x, y, width) {
        var textdim = context.measureText(text);
        context.fillText(text, x + (width-textdim.width)/2, y);
    }

    // Get a random int between low and high, inclusive
    function randRange(low, high) {
        return Math.floor(low + Math.random()*(high-low+1));
    }

    // Mouse event handlers
    function onMouseDown(e) {
        // Get the mouse position
        var pos = getMousePos(canvas, e);

        if (gameover) {
            // Start a new game
            tryNewGame();
        } else {
            // Change the direction of the snake
            snake.direction = (snake.direction + 1) % snake.directions.length;
        }
    }

    // Keyboard event handler
    function onKeyDown(e) {
        if (gameover) {
            tryNewGame();
        } else {
            if (e.keyCode == 37 || e.keyCode == 65) {
                // Left or A
                if (snake.direction != 1)  {
                    snake.direction = 3;
                }
            } else if (e.keyCode == 38 || e.keyCode == 87) {
                // Up or W
                if (snake.direction != 2)  {
                    snake.direction = 0;
                }
            } else if (e.keyCode == 39 || e.keyCode == 68) {
                // Right or D
                if (snake.direction != 3)  {
                    snake.direction = 1;
                }
            } else if (e.keyCode == 40 || e.keyCode == 83) {
                // Down or S
                if (snake.direction != 0)  {
                    snake.direction = 2;
                }
            }

            // Grow for demonstration purposes
            if (e.keyCode == 32) {
                snake.grow();
            }
        }
    }

    // Get the mouse position
    function getMousePos(canvas, e) {
        var rect = canvas.getBoundingClientRect();
        return {
            x: Math.round((e.clientX - rect.left)/(rect.right - rect.left)*canvas.width),
            y: Math.round((e.clientY - rect.top)/(rect.bottom - rect.top)*canvas.height)
        };
    }

    // Call init to start the game
    //init();
};
</script>
";
    }

    // line 37
    public function block_bgimage($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "background-image:url('";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getBackground", [], "any", false, false, false, 37), "html", null, true);
        echo "'); background-repeat: no-repeat; background-size: cover; background-position: center center;";
    }

    public function getTemplateName()
    {
        return "@Cms/login/login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  832 => 37,  208 => 108,  201 => 100,  194 => 98,  188 => 95,  182 => 94,  170 => 85,  162 => 82,  153 => 76,  141 => 67,  127 => 58,  114 => 48,  109 => 46,  100 => 40,  96 => 38,  90 => 37,  84 => 36,  51 => 5,  47 => 4,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Cms/login/login.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/CmsBundle/Resources/views/login/login.html.twig");
    }
}
