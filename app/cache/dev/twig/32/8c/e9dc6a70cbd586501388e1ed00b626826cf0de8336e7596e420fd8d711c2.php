<?php

/* AnsiGhassenBundle:Message:index.html.twig */
class __TwigTemplate_328ce9dc6a70cbd586501388e1ed00b626826cf0de8336e7596e420fd8d711c2 extends Twig_Template
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
            'conversations' => array($this, 'block_conversations'),
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
    public function block_conversations($context, array $blocks = array())
    {
        // line 4
        echo "    
  <div class=\"box\" > \t\t  
\t\t
                <div class=\"box-header with-border\">
                   
                  ";
        // line 9
        echo $this->env->getExtension('actions')->renderUri($this->env->getExtension('http_kernel')->controller("AnsiGhassenBundle:Message:recherche"), array());
        // line 10
        echo "                     
                </div><!-- /.box-header -->
                <div class=\"box-body\">
     <div class=\"col-lg-3 col-xs-6\">                
\t\t";
        // line 14
        if ((twig_length_filter($this->env, (isset($context["messages"]) ? $context["messages"] : $this->getContext($context, "messages"))) != 0)) {
            // line 15
            echo "                    <ul class=\"thumbnails\">
                ";
            // line 16
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["messages"]) ? $context["messages"] : $this->getContext($context, "messages")));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 17
                echo "                    <li class=\"span3\"  >

              <!-- small box -->
              <div class=\"small-box bg-aqua\">
                
                    ";
                // line 22
                if (($this->getAttribute($this->getAttribute($context["message"], "Receiver", array()), "id", array()) == $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "id", array()))) {
                    echo " 
                        <div class=\"inner\">
                     <img src=\"";
                    // line 24
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute($context["message"], "sender", array()), "photo", array())), "html", null, true);
                    echo "\"   width=\"50\" height=\"50\" class=\"img-circle\" >
                      <p>";
                    // line 25
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["message"], "sender", array()), "username", array()), "html", null, true);
                    echo "</p>
                       </div>
               
                <a href=\"";
                    // line 28
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("show_Messages", array("id" => $this->getAttribute($this->getAttribute($context["message"], "sender", array()), "id", array()))), "html", null, true);
                    echo "\" class=\"small-box-footer\" >
                  Ouvrir <i class=\"fa fa-arrow-circle-right\"></i>
                </a>
                   <a href=\"";
                    // line 31
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("supConversation", array("id" => $this->getAttribute($this->getAttribute($context["message"], "sender", array()), "id", array()))), "html", null, true);
                    echo "\" class=\"small-box-footer\" >
                  supprimer  <i class=\"fa fa-arrow-circle-right\"></i>
                </a>
                  \t<a  href=\"";
                    // line 34
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("coversationPdf", array("id" => $this->getAttribute($this->getAttribute($context["message"], "sender", array()), "id", array()))), "html", null, true);
                    echo "\" target=\"_blank\" class=\"small-box-footer\">
                  Télécharger  <i class=\"fa fa-arrow-circle-right\"></i>
                </a>
                        ";
                } else {
                    // line 38
                    echo "                              <div class=\"inner\">
                             <img src=\"";
                    // line 39
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute($context["message"], "receiver", array()), "photo", array())), "html", null, true);
                    echo "\"   width=\"50\" height=\"50\" class=\"img-circle\" > 
                             <p>";
                    // line 40
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["message"], "receiver", array()), "username", array()), "html", null, true);
                    echo "</p>
                             </div>
                           <a href=\"";
                    // line 42
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("show_Messages", array("id" => $this->getAttribute($this->getAttribute($context["message"], "Receiver", array()), "id", array()))), "html", null, true);
                    echo "\" class=\"small-box-footer\" >
                  Ouvrir <i class=\"fa fa-arrow-circle-right\"></i>
                </a>
                   <a href=\"";
                    // line 45
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("supConversation", array("id" => $this->getAttribute($this->getAttribute($context["message"], "Receiver", array()), "id", array()))), "html", null, true);
                    echo "\" class=\"small-box-footer\" >
                  Supprimer  <i class=\"fa fa-arrow-circle-right\"></i>
                </a>
\t\t\t\t<a  href=\"";
                    // line 48
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("coversationPdf", array("id" => $this->getAttribute($this->getAttribute($context["message"], "Receiver", array()), "id", array()))), "html", null, true);
                    echo "\" target=\"_blank\" class=\"small-box-footer\">
                  Télécharger  <i class=\"fa fa-arrow-circle-right\"></i>
                </a>
                            ";
                }
                // line 52
                echo "                      
                </div>
               
               
             
                         
                    </li>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 60
            echo "                </ul>
               
                  <div class=\"navigation\">
                    ";
            // line 63
            echo $this->env->getExtension('knp_pagination')->render((isset($context["messages"]) ? $context["messages"] : $this->getContext($context, "messages")));
            echo "
                </div>  
          
            ";
        } else {
            // line 67
            echo "                Aucune Conversations
            ";
        }
        // line 68
        echo "\t\t  
           </div>        
                </div><!-- ./box-body -->
                 
    </div>     
";
    }

    public function getTemplateName()
    {
        return "AnsiGhassenBundle:Message:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  164 => 68,  160 => 67,  153 => 63,  148 => 60,  135 => 52,  128 => 48,  122 => 45,  116 => 42,  111 => 40,  107 => 39,  104 => 38,  97 => 34,  91 => 31,  85 => 28,  79 => 25,  75 => 24,  70 => 22,  63 => 17,  59 => 16,  56 => 15,  54 => 14,  48 => 10,  46 => 9,  39 => 4,  36 => 3,  11 => 1,);
    }
}
