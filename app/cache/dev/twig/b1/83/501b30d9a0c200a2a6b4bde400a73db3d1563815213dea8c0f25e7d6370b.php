<?php

/* AnsiGhassenBundle:GroupDis:edit.html.twig */
class __TwigTemplate_b183501b30d9a0c200a2a6b4bde400a73db3d1563815213dea8c0f25e7d6370b extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("GroupDis_update", array("id" => $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "id", array()))), "html", null, true);
        echo "\" method=\"post\" >

    ";
        // line 6
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), 'widget');
        echo "

</form>
";
    }

    public function getTemplateName()
    {
        return "AnsiGhassenBundle:GroupDis:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 6,  39 => 4,  36 => 3,  11 => 1,);
    }
}
