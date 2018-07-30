<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_e579c0ffa05817dbf85f0d4173f5e8240d56480fc3a15ff3b0016b9727e188ce extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_e51c780a8abb3b8303eb6cfefdf103a10b1732accde51126ab4599984857a99c = $this->env->getExtension("native_profiler");
        $__internal_e51c780a8abb3b8303eb6cfefdf103a10b1732accde51126ab4599984857a99c->enter($__internal_e51c780a8abb3b8303eb6cfefdf103a10b1732accde51126ab4599984857a99c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_e51c780a8abb3b8303eb6cfefdf103a10b1732accde51126ab4599984857a99c->leave($__internal_e51c780a8abb3b8303eb6cfefdf103a10b1732accde51126ab4599984857a99c_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_729a584a9276f67bf47e282c48513cf485c2f8df3c6bdf95edbe5263466094c9 = $this->env->getExtension("native_profiler");
        $__internal_729a584a9276f67bf47e282c48513cf485c2f8df3c6bdf95edbe5263466094c9->enter($__internal_729a584a9276f67bf47e282c48513cf485c2f8df3c6bdf95edbe5263466094c9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_729a584a9276f67bf47e282c48513cf485c2f8df3c6bdf95edbe5263466094c9->leave($__internal_729a584a9276f67bf47e282c48513cf485c2f8df3c6bdf95edbe5263466094c9_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_b8267e7731facf7dbd4afe34c045c3e7fc2b7b9dc2f415f02860e72fdc0165d6 = $this->env->getExtension("native_profiler");
        $__internal_b8267e7731facf7dbd4afe34c045c3e7fc2b7b9dc2f415f02860e72fdc0165d6->enter($__internal_b8267e7731facf7dbd4afe34c045c3e7fc2b7b9dc2f415f02860e72fdc0165d6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_b8267e7731facf7dbd4afe34c045c3e7fc2b7b9dc2f415f02860e72fdc0165d6->leave($__internal_b8267e7731facf7dbd4afe34c045c3e7fc2b7b9dc2f415f02860e72fdc0165d6_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_7bb3ea27fad6a5b0c1097c38b12d93466f8458381b64eee9896d7e4f1e58cc73 = $this->env->getExtension("native_profiler");
        $__internal_7bb3ea27fad6a5b0c1097c38b12d93466f8458381b64eee9896d7e4f1e58cc73->enter($__internal_7bb3ea27fad6a5b0c1097c38b12d93466f8458381b64eee9896d7e4f1e58cc73_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_7bb3ea27fad6a5b0c1097c38b12d93466f8458381b64eee9896d7e4f1e58cc73->leave($__internal_7bb3ea27fad6a5b0c1097c38b12d93466f8458381b64eee9896d7e4f1e58cc73_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@WebProfiler/Profiler/layout.html.twig' %}*/
/* */
/* {% block toolbar %}{% endblock %}*/
/* */
/* {% block menu %}*/
/* <span class="label">*/
/*     <span class="icon">{{ include('@WebProfiler/Icon/router.svg') }}</span>*/
/*     <strong>Routing</strong>*/
/* </span>*/
/* {% endblock %}*/
/* */
/* {% block panel %}*/
/*     {{ render(path('_profiler_router', { token: token })) }}*/
/* {% endblock %}*/
/* */
