<?php

/* FOSUserBundle:Security:login.html.twig */
class __TwigTemplate_c83248daf4007f57597647d3773c838fb6851ff312267b2f960fbf4d2dfa3a83 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("FOSUserBundle::layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'fos_user_content' => array($this, 'block_fos_user_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "FOSUserBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_fos_user_content($context, array $blocks = array())
    {
        // line 6
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 7
            echo "    <div>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), array(), "FOSUserBundle"), "html", null, true);
            echo "</div>
";
        }
        // line 9
        echo "<div class=\"login-box\">
<div class=\"login-logo\">
        <a ><b>Ghassen</b>MESSENGER</a>
      </div><!-- /.login-logo -->
      <div class=\"login-box-body\">
        <p class=\"login-box-msg\">Sign in to start your session</p>
        <form action=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("fos_user_security_check");
        echo "\" method=\"post\">
          <div class=\"form-group has-feedback\">
                   
                    <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : $this->getContext($context, "csrf_token")), "html", null, true);
        echo "\" />

                    <input type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 20
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
        echo "\" required=\"required\" placeholder=\"Email\" class=\"form-control\"/>
                    <span class=\"glyphicon glyphicon-envelope form-control-feedback\"></span>
          </div>
              <div class=\"form-group has-feedback\">
                    
                    <input type=\"password\" id=\"password\" name=\"_password\" required=\"required\" placeholder=\"Password\" class=\"form-control\"/>
                    <span class=\"glyphicon glyphicon-lock form-control-feedback\"></span>
               </div>
<div class=\"row\">
            <div class=\"col-xs-8\">    
              <div class=\"checkbox icheck\">
                <label>
                  <input type=\"checkbox\" style=\"margin-left:13px;\"> Remember Me
                </label>
               </div> 
                  <input class=\"btn btn-primary btn-block btn-flat\"type=\"submit\" value=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.submit", array(), "FOSUserBundle"), "html", null, true);
        echo "\" style=\"margin-left:13px;\"/>
                                     
            </div><!-- /.col -->

          </div>
        </form>
                  <div class=\"row\">
            <div class=\"col-xs-8\">   
                  <p style=\"margin-left:13px;\" class=\"btn btn-primary btn-block btn-flat\">
                      <a href=\"";
        // line 44
        echo $this->env->getExtension('routing')->getPath("fos_user_registration_register");
        echo "\" style=\"color: white\">Inscription</a>
                  </p>
                                     
            </div><!-- /.col -->

          </div> 
                </div>
         </div>

";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 44,  84 => 35,  66 => 20,  61 => 18,  55 => 15,  47 => 9,  41 => 7,  39 => 6,  36 => 5,  11 => 1,);
    }
}
