<?php

/* AnsiGhassenBundle:Message:show.html.twig */
class __TwigTemplate_76a9446bd04f4359fa99f7f03d2fad18f96e399f6ca9c83ec0ce00455e8cc12d extends Twig_Template
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
            'showconv' => array($this, 'block_showconv'),
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
    public function block_showconv($context, array $blocks = array())
    {
        // line 4
        echo "


 <div>
<!---------------------------------------------------------- DIRECT CHAT -------------------------------------------------------------------------------->
                  <div class=\"box box-warning direct-chat direct-chat-warning\">
                    <div class=\"box-header with-border\">
                      <h3 class=\"box-title\">List des messages</h3>
                    
                    </div><!-- /.box-header -->

<div class=\"box-body\" >
      <!-- Conversations are loaded here -->
                      <div class=\"direct-chat-messages\" id=\"chat\" >
                          <div data-client=\"";
        // line 18
        echo twig_escape_filter($this->env, (isset($context["iduser"]) ? $context["iduser"] : $this->getContext($context, "iduser")), "html", null, true);
        echo "\" id=\"clientInput\"></div>
    ";
        // line 19
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($context["entity"]);
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 20
            echo "         ";
            if (($this->getAttribute($this->getAttribute($context["entity"], "Receiver", array()), "id", array()) == $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "id", array()))) {
                echo "  
               <!-- Message to the right -->
                        <div class=\"direct-chat-msg right\" data-username=\"";
                // line 22
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["entity"], "Receiver", array()), "username", array()), "html", null, true);
                echo "\" data-photo=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["entity"], "Receiver", array()), "photo", array()), "html", null, true);
                echo "\" id=\"param\">
                          <div class='direct-chat-info clearfix'>
                            <span class='direct-chat-name pull-right'>";
                // line 24
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["entity"], "sender", array()), "username", array()), "html", null, true);
                echo "</span>
                            <span class='direct-chat-timestamp pull-left'>";
                // line 25
                if ($this->getAttribute($context["entity"], "date", array())) {
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["entity"], "date", array()), "Y-m-d\\TH:i:sP"), "html", null, true);
                    echo " ";
                }
                echo "</span>
                          </div><!-- /.direct-chat-info -->
                          <img class=\"direct-chat-img\" src=\"";
                // line 27
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute($context["entity"], "sender", array()), "photo", array())), "html", null, true);
                echo "\"  alt=\"message user image\" /><!-- /.direct-chat-img -->
                          <div class=\"direct-chat-text\">
                            ";
                // line 29
                echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "Message", array()), "html", null, true);
                echo "
                          </div><!-- /.direct-chat-text -->
                        </div><!-- /.direct-chat-msg -->
                   
                       ";
            } else {
                // line 33
                echo "  ";
                $context["idami"] = $this->getAttribute($this->getAttribute($context["entity"], "sender", array()), "id", array());
                // line 34
                echo "                    
                        <!-- Message. Default to the left -->
                        <div class=\"direct-chat-msg\">
                          <div class='direct-chat-info clearfix'>
                            <span class='direct-chat-name pull-left'>";
                // line 38
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["entity"], "sender", array()), "username", array()), "html", null, true);
                echo "</span>
                            <span class='direct-chat-timestamp pull-right'>";
                // line 39
                if ($this->getAttribute($context["entity"], "date", array())) {
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["entity"], "date", array()), "Y-m-d\\TH:i:sP"), "html", null, true);
                    echo " ";
                }
                echo "</span>
                          </div><!-- /.direct-chat-info -->
                          <img class=\"direct-chat-img\" src=\"";
                // line 41
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute($context["entity"], "sender", array()), "photo", array())), "html", null, true);
                echo "\"  alt=\"message user image\" /><!-- /.direct-chat-img -->
                          <div class=\"direct-chat-text\">
                           ";
                // line 43
                echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "Message", array()), "html", null, true);
                echo "
                          </div><!-- /.direct-chat-text -->
                        </div><!-- /.direct-chat-msg -->
                      ";
            }
            // line 46
            echo " 
                  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        echo "                  <section id=\"resultat\"></section>
                  
                 
                    
                      </div><!--/.direct-chat-messages-->
                 <div class=\"box-footer\">
                      <form id=\"form\">
                        <div class=\"input-group\">
                          <input type=\"text\" name=\"message\" id=\"message\" placeholder=\"Type Message ...\" style=\"width:600px; height:30px;\" />
                            <a href=\"\" onclick=\"javascript:window.open('";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("show_phone", array("id" => (isset($context["iduser"]) ? $context["iduser"] : $this->getContext($context, "iduser")))), "html", null, true);
        echo "', 'webphone', 'height=340,width=300,top=20,left=20','scrollbars=no');\"> <img class=\"direct-chat-img\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/AnsiGhassen/images/phone.png"), "html", null, true);
        echo "\" alt=\"message user image\" /></a>
                        </div>
                      </form>
                    </div><!-- /.box-footer--> 
                    
                   
                   
                    
 </div><!-- /.box-footer-->
                  </div><!--/.direct-chat -->
                </div>
";
    }

    public function getTemplateName()
    {
        return "AnsiGhassenBundle:Message:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  152 => 57,  141 => 48,  134 => 46,  127 => 43,  122 => 41,  114 => 39,  110 => 38,  104 => 34,  101 => 33,  93 => 29,  88 => 27,  80 => 25,  76 => 24,  69 => 22,  63 => 20,  59 => 19,  55 => 18,  39 => 4,  36 => 3,  11 => 1,);
    }
}
