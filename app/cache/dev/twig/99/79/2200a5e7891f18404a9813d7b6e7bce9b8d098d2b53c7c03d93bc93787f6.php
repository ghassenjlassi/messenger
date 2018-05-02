<?php

/* AnsiGhassenBundle:GroupDis:showmessage.html.twig */
class __TwigTemplate_99792200a5e7891f18404a9813d7b6e7bce9b8d098d2b53c7c03d93bc93787f6 extends Twig_Template
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
                      <div class=\"direct-chat-messages\" id=\"chatgroup\" >
                          <div data-clientgroup=\"";
        // line 18
        echo twig_escape_filter($this->env, (isset($context["idgroup"]) ? $context["idgroup"] : $this->getContext($context, "idgroup")), "html", null, true);
        echo "\" id=\"clientgroup\"></div>
    ";
        // line 19
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["mesgrps"]) ? $context["mesgrps"] : $this->getContext($context, "mesgrps")));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 20
            echo "         ";
            if (($this->getAttribute($this->getAttribute($context["entity"], "sender", array()), "id", array()) == $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "id", array()))) {
                echo "  
                     <div class=\"direct-chat-msg\" data-username=\"";
                // line 21
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["entity"], "sender", array()), "username", array()), "html", null, true);
                echo "\" data-photo=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["entity"], "sender", array()), "photo", array()), "html", null, true);
                echo "\" data-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["entity"], "sender", array()), "id", array()), "html", null, true);
                echo "\"id=\"param\">
                          <div class='direct-chat-info clearfix'>
                            <span class='direct-chat-name pull-left'>";
                // line 23
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["entity"], "sender", array()), "username", array()), "html", null, true);
                echo "</span>
                            <span class='direct-chat-timestamp pull-right'>";
                // line 24
                if ($this->getAttribute($context["entity"], "date", array())) {
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["entity"], "date", array()), "Y-m-d\\TH:i:sP"), "html", null, true);
                    echo " ";
                }
                echo "</span>
                          </div><!-- /.direct-chat-info -->
                          <img class=\"direct-chat-img\" src=\"";
                // line 26
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute($context["entity"], "sender", array()), "photo", array())), "html", null, true);
                echo "\"  alt=\"message user image\" /><!-- /.direct-chat-img -->
                          <div class=\"direct-chat-text\">
                           ";
                // line 28
                echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "Message", array()), "html", null, true);
                echo "
                          </div><!-- /.direct-chat-text -->
                        </div><!-- /.direct-chat-msg -->
                        ";
            } else {
                // line 31
                echo "  
                
                        <!-- Message to the right -->
                        <div class=\"direct-chat-msg right\">
                          <div class='direct-chat-info clearfix'>
                            <span class='direct-chat-name pull-right'>";
                // line 36
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["entity"], "sender", array()), "username", array()), "html", null, true);
                echo "</span>
                            <span class='direct-chat-timestamp pull-left'>";
                // line 37
                if ($this->getAttribute($context["entity"], "date", array())) {
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["entity"], "date", array()), "Y-m-d\\TH:i:sP"), "html", null, true);
                    echo " ";
                }
                echo "</span>
                          </div><!-- /.direct-chat-info -->
                          <img class=\"direct-chat-img\" src=\"";
                // line 39
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute($context["entity"], "sender", array()), "photo", array())), "html", null, true);
                echo "\"  alt=\"message user image\" /><!-- /.direct-chat-img -->
                          <div class=\"direct-chat-text\">
                            ";
                // line 41
                echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "Message", array()), "html", null, true);
                echo "
                          </div><!-- /.direct-chat-text -->
                        </div><!-- /.direct-chat-msg -->
                        
           <!-- Message. Default to the left -->
                        
                      ";
            }
            // line 47
            echo " 
                  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "                  <section id=\"resultatgroup\"></section>
                   </div><!--/.direct-chat-messages-->
           <div class=\"box-footer\">
                      <form id=\"formgroup\">
                        <div class=\"input-group\">
                          <input type=\"text\" name=\"messagegroup\" id=\"messagegroup\" placeholder=\"Type Message ...\" style=\"width:600px; height:30px;\" />
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
        return "AnsiGhassenBundle:GroupDis:showmessage.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  142 => 49,  135 => 47,  125 => 41,  120 => 39,  112 => 37,  108 => 36,  101 => 31,  94 => 28,  89 => 26,  81 => 24,  77 => 23,  68 => 21,  63 => 20,  59 => 19,  55 => 18,  39 => 4,  36 => 3,  11 => 1,);
    }
}
