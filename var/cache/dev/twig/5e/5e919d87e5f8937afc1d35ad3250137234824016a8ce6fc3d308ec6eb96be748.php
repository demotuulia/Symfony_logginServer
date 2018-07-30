<?php

/* frontEnd/partials/genericList/paging.html.twig */
class __TwigTemplate_a5aec9520774c86fe31e3321f1faf97f68a11280f86ab974502af32e331d325b extends Twig_Template
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
        $__internal_d31ed93c907ee2e8dd7ef77fcdc42cfa22e95c1e185a400b343c6309b4f00c79 = $this->env->getExtension("native_profiler");
        $__internal_d31ed93c907ee2e8dd7ef77fcdc42cfa22e95c1e185a400b343c6309b4f00c79->enter($__internal_d31ed93c907ee2e8dd7ef77fcdc42cfa22e95c1e185a400b343c6309b4f00c79_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "frontEnd/partials/genericList/paging.html.twig"));

        // line 13
        echo "
<script src=\"/js/paging.js\"></script>

";
        // line 16
        if (((isset($context["totalRecords"]) ? $context["totalRecords"] : $this->getContext($context, "totalRecords")) > 0)) {
            // line 17
            echo "
    <div class=\"pull-xs-left\">
        ";
            // line 19
            $this->env->getExtension('form')->renderer->setTheme((isset($context["pagingForm"]) ? $context["pagingForm"] : $this->getContext($context, "pagingForm")), array(0 => "bootstrap_3_layout.html.twig"));
            // line 20
            echo "        ";
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["pagingForm"]) ? $context["pagingForm"] : $this->getContext($context, "pagingForm")), 'form_start', array("attr" => array("class" => (isset($context["pagingFormClass"]) ? $context["pagingFormClass"] : $this->getContext($context, "pagingFormClass")), "role" => "form")));
            echo "
        ";
            // line 21
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["pagingForm"]) ? $context["pagingForm"] : $this->getContext($context, "pagingForm")), 'widget');
            echo "
        ";
            // line 22
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["pagingForm"]) ? $context["pagingForm"] : $this->getContext($context, "pagingForm")), 'form_end');
            echo "
    </div>

    <div class=\"pull-xs-right\">
        <a href=\"#\" id ='ExportExcelLink'><img src=\"/images/excel.png\" > </a>
        Total amount items : ";
            // line 27
            echo twig_escape_filter($this->env, (isset($context["totalRecords"]) ? $context["totalRecords"] : $this->getContext($context, "totalRecords")), "html", null, true);
            echo "
    </div>

";
        }
        // line 31
        echo "

<script>
    <!-- initalize page chnage links -->
    globalOnChangePagingSelectLink = \"";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pagingLinks"]) ? $context["pagingLinks"] : $this->getContext($context, "pagingLinks")), "pageSelect", array()), "html", null, true);
        echo "\"
    globalOnChangePagingNextLink = \"";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pagingLinks"]) ? $context["pagingLinks"] : $this->getContext($context, "pagingLinks")), "next", array()), "html", null, true);
        echo "\"
    globalOnChangePagingPreviousLink = \"";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pagingLinks"]) ? $context["pagingLinks"] : $this->getContext($context, "pagingLinks")), "previous", array()), "html", null, true);
        echo "\"
    globalOnChangePagingExcelLink = \"";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pagingLinks"]) ? $context["pagingLinks"] : $this->getContext($context, "pagingLinks")), "excel", array()), "html", null, true);
        echo "\"
</script>";
        
        $__internal_d31ed93c907ee2e8dd7ef77fcdc42cfa22e95c1e185a400b343c6309b4f00c79->leave($__internal_d31ed93c907ee2e8dd7ef77fcdc42cfa22e95c1e185a400b343c6309b4f00c79_prof);

    }

    public function getTemplateName()
    {
        return "frontEnd/partials/genericList/paging.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 38,  73 => 37,  69 => 36,  65 => 35,  59 => 31,  52 => 27,  44 => 22,  40 => 21,  35 => 20,  33 => 19,  29 => 17,  27 => 16,  22 => 13,);
    }
}
/* {#*/
/* */
/*    This is a generic template for paging*/
/*    and work togther with the class AppBundle\Manager\Manager\FrontEndPaging*/
/* */
/*    This page expects the follwing variables*/
/* */
/*    pagingForm               a symfony form*/
/*    totalRecords             integer*/
/*    pagingLinks    array*/
/* */
/*  #}*/
/* */
/* <script src="/js/paging.js"></script>*/
/* */
/* {% if totalRecords >0 %}*/
/* */
/*     <div class="pull-xs-left">*/
/*         {% form_theme pagingForm 'bootstrap_3_layout.html.twig' %}*/
/*         {{ form_start(pagingForm , { 'attr': {'class':  pagingFormClass , 'role' : 'form' } } ) }}*/
/*         {{ form_widget(pagingForm) }}*/
/*         {{ form_end(pagingForm) }}*/
/*     </div>*/
/* */
/*     <div class="pull-xs-right">*/
/*         <a href="#" id ='ExportExcelLink'><img src="/images/excel.png" > </a>*/
/*         Total amount items : {{ totalRecords }}*/
/*     </div>*/
/* */
/* {% endif %}*/
/* */
/* */
/* <script>*/
/*     <!-- initalize page chnage links -->*/
/*     globalOnChangePagingSelectLink = "{{ pagingLinks.pageSelect }}"*/
/*     globalOnChangePagingNextLink = "{{ pagingLinks.next }}"*/
/*     globalOnChangePagingPreviousLink = "{{ pagingLinks.previous }}"*/
/*     globalOnChangePagingExcelLink = "{{ pagingLinks.excel }}"*/
/* </script>*/
