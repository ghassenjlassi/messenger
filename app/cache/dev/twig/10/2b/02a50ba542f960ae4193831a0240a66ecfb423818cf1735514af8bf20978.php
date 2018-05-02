<?php

/* AnsiGhassenBundle::layout.html.twig */
class __TwigTemplate_102b02a50ba542f960ae4193831a0240a66ecfb423818cf1735514af8bf20978 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'titre' => array($this, 'block_titre'),
            'conversations' => array($this, 'block_conversations'),
            'showconv' => array($this, 'block_showconv'),
            'groups' => array($this, 'block_groups'),
            'users' => array($this, 'block_users'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html>
    <head>
        <meta charset=\"UTF-8\"/>
          <title>  ";
        // line 5
        $this->displayBlock('titre', $context, $blocks);
        echo "</title>
            
            <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'/>
            <link href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\" />
            <!-- Ionicons -->
            <link href=\"https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css\" rel=\"stylesheet\" type=\"text/css\" />
            <link rel=\"stylesheet\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/AnsiGhassen/css/skins/skin-blue.min.css"), "html", null, true);
        echo "\" />
            <link rel=\"stylesheet\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap.css"), "html", null, true);
        echo "\" />
            <link rel=\"stylesheet\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap-responsive.css"), "html", null, true);
        echo "\" />
           
            <link rel=\"stylesheet\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/AdminLTE.min.css"), "html", null, true);
        echo "\" />

    </head>

    <body class=\"skin-blue sidebar-mini\">
        <div class=\"wrapper\" data-id=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "id", array()), "html", null, true);
        echo "\"  id=\"session\">

            <!-- Main Header -->
            <header class=\"main-header\">

                <!-- Logo -->
                <a href=\"#\" class=\"logo\">
                    <!-- mini logo for sidebar mini 50x50 pixels -->

                    <span class=\"logo-lg\"><b>G-</b>Messenger</span>
                </a>

                <!-- Header Navbar -->
                <nav class=\"navbar navbar-static-top\" role=\"navigation\">
                    <!-- Sidebar toggle button-->

                    <!-- Navbar Right Menu -->
                    <div class=\"navbar-custom-menu\">
                        <ul class=\"nav navbar-nav\">
                            <li class=\"dropdown messages-menu\">
                <a class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                  <i class=\"fa fa-envelope-o\"></i>
                  <section id=\"notification\"></section>
                  
                </a></li>
                            <!-- User Account Menu -->
                            <li class=\"dropdown user user-menu\">
                                <!-- Menu Toggle Button -->
                                <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                                    <!-- The user image in the navbar-->
                                    <img src=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "photo", array())), "html", null, true);
        echo "\" class=\"user-image\" alt=\"User Image\"/>
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class=\"hidden-xs\">";
        // line 52
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "username", array()), "html", null, true);
        echo "</span>
                                </a>
                                <ul class=\"dropdown-menu\">
                                    <!-- The user image in the menu -->
                                    <li class=\"user-header\">
                                        <img src=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "photo", array())), "html", null, true);
        echo "\" class=\"img-circle\" alt=\"User Image\" />
                                        <p>
                                            ";
        // line 59
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "username", array()), "html", null, true);
        echo "
                                            <small></small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->

                                    <!-- Menu Footer-->
                                    <li class=\"user-footer\">
                                        <div class=\"pull-left\">
                                            <a href=\"#\" class=\"btn btn-default btn-flat\">Profile</a>
                                        </div>
                                        <div class=\"pull-right\">
                                            <a href=\"";
        // line 71
        echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
        echo "\" class=\"btn btn-default btn-flat\">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                                <a href=\"#\" data-toggle=\"control-sidebar\"><i class=\"fa fa-gears\"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class=\"main-sidebar\">

                <!-- sidebar: style can be found in sidebar.less -->
                <section class=\"sidebar\">

                    <!-- Sidebar user panel -->
                    <div class=\"user-panel\">
                        <div class=\"pull-left image\">
                            <img src=\"";
        // line 93
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "photo", array())), "html", null, true);
        echo "\" class=\"img-circle\" alt=\"User Image\" />
                        </div>
                        <div class=\"pull-left info\">
                            <p>";
        // line 96
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "username", array()), "html", null, true);
        echo "</p>

                            <a href=\"#\"><i class=\"fa fa-circle text-success\"></i> Online</a>
                        </div>
                    </div>

                    <ul class=\"sidebar-menu\">
                        <li class=\"header\">MAIN NAVIGATION</li>
                        <li class=\"active treeview\">
                            <a href=\"";
        // line 105
        echo $this->env->getExtension('routing')->getPath("message");
        echo "\">
                                <i class=\"fa fa-dashboard\"></i> <span>Liste des Conversations</span> 
                            </a> 
                        </li>
                        <li class=\"treeview\">
                            <a href=\"";
        // line 110
        echo $this->env->getExtension('routing')->getPath("groupDis");
        echo "\">
                                <i class=\"fa fa-files-o\"></i>
                                <span>Liste des Groupes</span>
                            </a>
                        </li>
                        
                         <li class=\"treeview\">
                            <a href=\"";
        // line 117
        echo $this->env->getExtension('routing')->getPath("groupDis_new");
        echo "\">
                                <i class=\"fa fa-files-o\"></i>
                                <span>Créer un groupe</span>
                            </a>
                        </li>
                           <li class=\"treeview\">
                            <a href=\"";
        // line 123
        echo $this->env->getExtension('routing')->getPath("user");
        echo "\">
                                <i class=\"fa fa-files-o\"></i>
                                <span>Liste des Amis</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class=\"content-wrapper\">
                <section class=\"content-header\">
                    <h1>
                        Chat
                        <small>Messenger</small>
                    </h1>

                </section>
                <section class=\"content\">

                    <div> ";
        // line 144
        $this->displayBlock('conversations', $context, $blocks);
        echo "</div>
                    <div>";
        // line 145
        $this->displayBlock('showconv', $context, $blocks);
        echo "</div>
                     <div>";
        // line 146
        $this->displayBlock('groups', $context, $blocks);
        echo "</div>
                     <div>";
        // line 147
        $this->displayBlock('users', $context, $blocks);
        echo "</div>
                </section>  
            </div>


</div><!-- ./wrapper -->
            <!-- REQUIRED JS SCRIPTS -->

            <!-- jQuery 2.1.3 -->

            <script src=\"";
        // line 157
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jQuery-2.1.3.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 158
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 159
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/apppp.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 160
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/socket.io.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 161
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/main.js"), "html", null, true);
        echo "\"></script>

    </body>
            
</html>          ";
    }

    // line 5
    public function block_titre($context, array $blocks = array())
    {
        echo "Messenger Chat";
    }

    // line 144
    public function block_conversations($context, array $blocks = array())
    {
    }

    // line 145
    public function block_showconv($context, array $blocks = array())
    {
    }

    // line 146
    public function block_groups($context, array $blocks = array())
    {
    }

    // line 147
    public function block_users($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "AnsiGhassenBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  291 => 147,  286 => 146,  281 => 145,  276 => 144,  270 => 5,  261 => 161,  257 => 160,  253 => 159,  249 => 158,  245 => 157,  232 => 147,  228 => 146,  224 => 145,  220 => 144,  196 => 123,  187 => 117,  177 => 110,  169 => 105,  157 => 96,  151 => 93,  126 => 71,  111 => 59,  106 => 57,  98 => 52,  93 => 50,  60 => 20,  52 => 15,  47 => 13,  43 => 12,  39 => 11,  30 => 5,  24 => 1,);
    }
}
