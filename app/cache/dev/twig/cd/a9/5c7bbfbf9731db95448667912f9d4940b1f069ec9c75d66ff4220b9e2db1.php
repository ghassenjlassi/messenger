<?php

/* AnsiGhassenBundle:GroupDis:newgroup.html.twig */
class __TwigTemplate_cda95c7bbfbf9731db95448667912f9d4940b1f069ec9c75d66ff4220b9e2db1 extends Twig_Template
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

    // line 3
    public function block_groups($context, array $blocks = array())
    {
        // line 4
        echo "<form action=\"";
        echo $this->env->getExtension('routing')->getPath("groupDis_create");
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo ">
 
    ";
        // line 6
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "

    <input type=\"submit\" />
</form>
";
    }

    public function getTemplateName()
    {
        return "AnsiGhassenBundle:GroupDis:newgroup.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 6,  39 => 4,  36 => 3,  11 => 1,);
    }
}
