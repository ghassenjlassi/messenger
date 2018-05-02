<?php

/* AcmeUserBundle:User:index.html.twig */
class __TwigTemplate_80c96a2500d35e5da0caa4dabf528a904e7424e745b1d24245b1a36bc62ab1d1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("AnsiGhassenBundle::layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'users' => array($this, 'block_users'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AnsiGhassenBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_users($context, array $blocks = array())
    {
        // line 4
        echo "
    <div class=\"col-md-6\">
        <!-- USERS LIST -->
        <div class=\"box box-danger\">
            <div class=\"box-header with-border\">
                <h3 class=\"box-title\">Liste des amis</h3>
                <div class=\"box-tools pull-right\">
              ";
        // line 11
        echo $this->env->getExtension('actions')->renderUri($this->env->getExtension('http_kernel')->controller("AcmeUserBundle:User:recherche"), array());
        // line 12
        echo "                </div>
            </div><!-- /.box-header -->
            
                <div class=\"box-body no-padding\">
                    ";
        // line 16
        if ((twig_length_filter($this->env, (isset($context["friends"]) ? $context["friends"] : $this->getContext($context, "friends"))) != 0)) {
            // line 17
            echo "                    <ul class=\"users-list clearfix\">
                        
                        ";
            // line 19
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["friends"]) ? $context["friends"] : $this->getContext($context, "friends")));
            foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
                // line 20
                echo "                        <li>
                            <img src=\"";
                // line 21
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($context["entity"], "photo", array())), "html", null, true);
                echo "\" alt=\"User Image\"/>
                            <a class=\"users-list-name\" href=\"";
                // line 22
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("show_Messages", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "username", array()), "html", null, true);
                echo "</a> 
                        </li>
                          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 25
            echo "                    </ul><!-- /.users-list -->
                    <div class=\"navigation\">
                    ";
            // line 27
            echo $this->env->getExtension('knp_pagination')->render((isset($context["friends"]) ? $context["friends"] : $this->getContext($context, "friends")));
            echo "
                </div>
                ";
        } else {
            // line 30
            echo "                Aucun utilisateurs
            ";
        }
        // line 32
        echo "                </div><!-- /.box-body --> 
          
            <div class=\"box-footer text-center\">
                
            </div><!-- /.box-footer -->
        </div><!--/.box -->
    </div><!-- /.col -->




";
    }

    public function getTemplateName()
    {
        return "AcmeUserBundle:User:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 32,  94 => 30,  88 => 27,  84 => 25,  73 => 22,  69 => 21,  66 => 20,  62 => 19,  58 => 17,  56 => 16,  50 => 12,  48 => 11,  39 => 4,  36 => 3,  11 => 1,);
    }
}
