<?php

/* base.html.twig */
class __TwigTemplate_42a6da1031d5a0b670bb3da272b626b92ee4f5ff4f55e166c8fb0505eff4b6af extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_cdf3ebff3e667b74ce007e8ea84ab2165d31b3ba7dd5302520a42e3d59a512df = $this->env->getExtension("native_profiler");
        $__internal_cdf3ebff3e667b74ce007e8ea84ab2165d31b3ba7dd5302520a42e3d59a512df->enter($__internal_cdf3ebff3e667b74ce007e8ea84ab2165d31b3ba7dd5302520a42e3d59a512df_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 7
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 8
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />


        <!-- external css -->
        <link rel=\"stylesheet\" href=\"/js/jquery-ui-1.12.0/jquery-ui.min.css\">
        <link rel=\"stylesheet\" href=\"/bootstrap-4.0.0-alpha.3/dist/css/bootstrap.min.css\">

        <!-- css -->
        <link rel=\"stylesheet\" href=\"/css/main.css\">


        <!-- external Javascript -->
        <script src=\"/js/jquery-3.1.0.min.js\"></script>
        <script src=\"/js/jquery-ui-1.12.0/jquery-ui.js\"></script>
        <script src=\"/js/jquery-ui-1.12.0/jquery-ui.min.js\"></script>
        <script src=\"https://www.atlasestateagents.co.uk/javascript/tether.min.js\"></script>
        <script src=\"/bootstrap-4.0.0-alpha.3/docs/dist/js/bootstrap.min.js\"></script>

    </head>
    <body>


    ";
        // line 30
        $this->loadTemplate("basePartials/menu.html.twig", "base.html.twig", 30)->display($context);
        // line 31
        echo "

    <div class=\"container theme-showcase\" role=\"main\">
        ";
        // line 34
        $this->displayBlock('body', $context, $blocks);
        // line 35
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 36
        echo "    </div>
    </body>
</html>
";
        
        $__internal_cdf3ebff3e667b74ce007e8ea84ab2165d31b3ba7dd5302520a42e3d59a512df->leave($__internal_cdf3ebff3e667b74ce007e8ea84ab2165d31b3ba7dd5302520a42e3d59a512df_prof);

    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        $__internal_679a7ae5a8a6b85001cd2588cf5f8d4b8b7bd19c2b7f3e34c7b18bc890dc004f = $this->env->getExtension("native_profiler");
        $__internal_679a7ae5a8a6b85001cd2588cf5f8d4b8b7bd19c2b7f3e34c7b18bc890dc004f->enter($__internal_679a7ae5a8a6b85001cd2588cf5f8d4b8b7bd19c2b7f3e34c7b18bc890dc004f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_679a7ae5a8a6b85001cd2588cf5f8d4b8b7bd19c2b7f3e34c7b18bc890dc004f->leave($__internal_679a7ae5a8a6b85001cd2588cf5f8d4b8b7bd19c2b7f3e34c7b18bc890dc004f_prof);

    }

    // line 7
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_6d6f7f4b07e30b4c46bc00b79cf97af86d051397babf8867ffbd724c067c0457 = $this->env->getExtension("native_profiler");
        $__internal_6d6f7f4b07e30b4c46bc00b79cf97af86d051397babf8867ffbd724c067c0457->enter($__internal_6d6f7f4b07e30b4c46bc00b79cf97af86d051397babf8867ffbd724c067c0457_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_6d6f7f4b07e30b4c46bc00b79cf97af86d051397babf8867ffbd724c067c0457->leave($__internal_6d6f7f4b07e30b4c46bc00b79cf97af86d051397babf8867ffbd724c067c0457_prof);

    }

    // line 34
    public function block_body($context, array $blocks = array())
    {
        $__internal_c6f705dbd90838df342b96408df131bec2b286f8ab00cedb8eeb83daa7db0482 = $this->env->getExtension("native_profiler");
        $__internal_c6f705dbd90838df342b96408df131bec2b286f8ab00cedb8eeb83daa7db0482->enter($__internal_c6f705dbd90838df342b96408df131bec2b286f8ab00cedb8eeb83daa7db0482_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_c6f705dbd90838df342b96408df131bec2b286f8ab00cedb8eeb83daa7db0482->leave($__internal_c6f705dbd90838df342b96408df131bec2b286f8ab00cedb8eeb83daa7db0482_prof);

    }

    // line 35
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_2c5ec3c488d73c56f293a0e28ddeae8cdc83232a6d84c765919f55785d27a6cd = $this->env->getExtension("native_profiler");
        $__internal_2c5ec3c488d73c56f293a0e28ddeae8cdc83232a6d84c765919f55785d27a6cd->enter($__internal_2c5ec3c488d73c56f293a0e28ddeae8cdc83232a6d84c765919f55785d27a6cd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_2c5ec3c488d73c56f293a0e28ddeae8cdc83232a6d84c765919f55785d27a6cd->leave($__internal_2c5ec3c488d73c56f293a0e28ddeae8cdc83232a6d84c765919f55785d27a6cd_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 35,  110 => 34,  99 => 7,  87 => 6,  77 => 36,  74 => 35,  72 => 34,  67 => 31,  65 => 30,  39 => 8,  37 => 7,  33 => 6,  26 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="UTF-8" />*/
/*         <meta http-equiv="X-UA-Compatible" content="IE=edge">*/
/*         <title>{% block title %}Welcome!{% endblock %}</title>*/
/*         {% block stylesheets %}{% endblock %}*/
/*         <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />*/
/* */
/* */
/*         <!-- external css -->*/
/*         <link rel="stylesheet" href="/js/jquery-ui-1.12.0/jquery-ui.min.css">*/
/*         <link rel="stylesheet" href="/bootstrap-4.0.0-alpha.3/dist/css/bootstrap.min.css">*/
/* */
/*         <!-- css -->*/
/*         <link rel="stylesheet" href="/css/main.css">*/
/* */
/* */
/*         <!-- external Javascript -->*/
/*         <script src="/js/jquery-3.1.0.min.js"></script>*/
/*         <script src="/js/jquery-ui-1.12.0/jquery-ui.js"></script>*/
/*         <script src="/js/jquery-ui-1.12.0/jquery-ui.min.js"></script>*/
/*         <script src="https://www.atlasestateagents.co.uk/javascript/tether.min.js"></script>*/
/*         <script src="/bootstrap-4.0.0-alpha.3/docs/dist/js/bootstrap.min.js"></script>*/
/* */
/*     </head>*/
/*     <body>*/
/* */
/* */
/*     {% include 'basePartials/menu.html.twig'   %}*/
/* */
/* */
/*     <div class="container theme-showcase" role="main">*/
/*         {% block body %}{% endblock %}*/
/*         {% block javascripts %}{% endblock %}*/
/*     </div>*/
/*     </body>*/
/* </html>*/
/* */
