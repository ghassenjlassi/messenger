<?php

/* AnsiGhassenBundle:GroupDis:messagegroupPdf.html.twig */
class __TwigTemplate_cb6dbf6b0c998a11c93ee61dc7cda8651920bf918546f713b5c49cf6bffb9a9f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <title>Conversation</title>

        
    </head>
    <body>
        <h1>Conversations de Groupe Ghassen</h1>
        <div class=\"span9\">
 ";
        // line 12
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($context["mesgrps"]);
        foreach ($context['_seq'] as $context["_key"] => $context["mesgrps"]) {
            // line 13
            echo "                    <div id=\"messages\">
                        <div class=\"message\" id=\"msgtpl\">
                       <img src=\"";
            // line 15
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute($context["mesgrps"], "sender", array()), "photo", array())), "html", null, true);
            echo "\"   width=\"50\" height=\"50\">
                           <div class=\"info\">
                               <h4>";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["mesgrps"], "sender", array()), "username", array()), "html", null, true);
            echo "</h4>
                            
                               <p>";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($context["mesgrps"], "Message", array()), "html", null, true);
            echo "</p>
                               <span class=\"date\"> ";
            // line 20
            if ($this->getAttribute($context["mesgrps"], "date", array())) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["mesgrps"], "date", array()), "Y-m-d\\TH:i:sP"), "html", null, true);
                echo " ";
            }
            echo "</span>
                            </div>
                        </div>
                    </div>
                   
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mesgrps'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "
        </div>
        
      
    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "AnsiGhassenBundle:GroupDis:messagegroupPdf.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 26,  54 => 20,  50 => 19,  45 => 17,  40 => 15,  36 => 13,  32 => 12,  19 => 1,);
    }
}
