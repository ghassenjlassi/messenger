<?php

/* AnsiGhassenBundle:GroupDis:index.html.twig */
class __TwigTemplate_10025ccf92e03577b9f66b65b539b23052283e7aecf3f567b9e0e15f42df0989 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        try {
            $this->parent = $this->env->loadTemplate("AnsiGhassenBundle::layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(2);

            throw $e;
        }

        $this->blocks = array(
            'groups' => array($this, 'block_groups'),
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

    // line 4
    public function block_groups($context, array $blocks = array())
    {
        // line 5
        echo "
    <div class=\"box\"> \t\t  

        <div class=\"box-header with-border\">

            ";
        // line 10
        echo $this->env->getExtension('actions')->renderUri($this->env->getExtension('http_kernel')->controller("AnsiGhassenBundle:GroupDis:recherche"), array());
        // line 11
        echo "
        </div><!-- /.box-header -->
        <div class=\"box-body\">
            <div class=\"col-lg-3 col-xs-6\">                
                ";
        // line 15
        if ((twig_length_filter($this->env, (isset($context["groupes"]) ? $context["groupes"] : $this->getContext($context, "groupes"))) != 0)) {
            // line 16
            echo "                    <ul class=\"thumbnails\">
                        ";
            // line 17
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["groupes"]) ? $context["groupes"] : $this->getContext($context, "groupes")));
            foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
                // line 18
                echo "                            <li class=\"span3\"  >

                                <!-- small box -->
                                <div class=\"small-box bg-aqua\">


                                    <div class=\"inner\">
                                        <div class=\"img-circle\"> <img src=\"";
                // line 25
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute($this->getAttribute($context["entity"], "users", array()), 0, array(), "array"), "photo", array())), "html", null, true);
                echo "\"   width=\"50\" height=\"50\"  >
                                            <img src=\"";
                // line 26
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute($this->getAttribute($context["entity"], "users", array()), 1, array(), "array"), "photo", array())), "html", null, true);
                echo "\"   width=\"50\" height=\"50\"  ></div>
                                            ";
                // line 27
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["entity"], "users", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["membre"]) {
                    echo "       
                                            <a style=\"color: black\">";
                    // line 28
                    echo twig_escape_filter($this->env, $this->getAttribute($context["membre"], "username", array()), "html", null, true);
                    echo ",&nbsp</a>
                                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['membre'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 30
                echo "                                    </div>


                                    <a href=\"";
                // line 33
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("msgroupDis_show", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
                echo "\" class=\"small-box-footer\" >
                                        Ouvrir <i class=\"fa fa-arrow-circle-right\"></i>
                                    </a>
                                      <a  href=\"";
                // line 36
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("convgroupPDF", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
                echo "\" target=\"_blank\" class=\"small-box-footer\">
                                        Télécharger  <i class=\"fa fa-arrow-circle-right\"></i>
                                    </a>
                                    <a href=\"";
                // line 39
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("GroupDis_edit", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
                echo "\" class=\"small-box-footer\" >
                                        Ajouter ou supprimer un ami <i class=\"fa fa-arrow-circle-right\"></i>
                                    </a>
                                    ";
                // line 42
                if (($this->getAttribute($this->getAttribute($context["entity"], "creatby", array()), "id", array()) == $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "id", array()))) {
                    echo "      
                                    <a href=\"";
                    // line 43
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("deletegroup", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
                    echo "\"  class=\"small-box-footer\" >
                                        supprimer Groupe <i class=\"fa fa-arrow-circle-right\"></i>
                                    </a>
                                    ";
                }
                // line 47
                echo "                                   

                                </div>


                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 53
            echo "
                        </li>

                    </ul>

                    <div class=\"navigation\">
                        ";
            // line 59
            echo $this->env->getExtension('knp_pagination')->render((isset($context["groupes"]) ? $context["groupes"] : $this->getContext($context, "groupes")));
            echo "
                    </div>  

                ";
        } else {
            // line 63
            echo "                    Aucun Groupes
                ";
        }
        // line 64
        echo "\t\t  
            </div>        
        </div><!-- ./box-body -->

    </div>     
";
    }

    public function getTemplateName()
    {
        return "AnsiGhassenBundle:GroupDis:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  158 => 64,  154 => 63,  147 => 59,  139 => 53,  128 => 47,  121 => 43,  117 => 42,  111 => 39,  105 => 36,  99 => 33,  94 => 30,  86 => 28,  80 => 27,  76 => 26,  72 => 25,  63 => 18,  59 => 17,  56 => 16,  54 => 15,  48 => 11,  46 => 10,  39 => 5,  36 => 4,  11 => 2,);
    }
}
