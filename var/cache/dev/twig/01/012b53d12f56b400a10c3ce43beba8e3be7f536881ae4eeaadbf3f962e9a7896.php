<?php

/* frontEnd/logsList.html.twig */
class __TwigTemplate_fd497bb46723b16b62c8dc89359fcdc5de56333a0e3a2267cf8bb27823e63477 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "frontEnd/logsList.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_e294ab983078ded257747f6b8709f4bb6e48f1da73864157964270520699b833 = $this->env->getExtension("native_profiler");
        $__internal_e294ab983078ded257747f6b8709f4bb6e48f1da73864157964270520699b833->enter($__internal_e294ab983078ded257747f6b8709f4bb6e48f1da73864157964270520699b833_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "frontEnd/logsList.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_e294ab983078ded257747f6b8709f4bb6e48f1da73864157964270520699b833->leave($__internal_e294ab983078ded257747f6b8709f4bb6e48f1da73864157964270520699b833_prof);

    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        $__internal_da135a334e8f6dff23ead5df0726bb7dccd2a889ec1205557dca0419dc7a10de = $this->env->getExtension("native_profiler");
        $__internal_da135a334e8f6dff23ead5df0726bb7dccd2a889ec1205557dca0419dc7a10de->enter($__internal_da135a334e8f6dff23ead5df0726bb7dccd2a889ec1205557dca0419dc7a10de_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 3
        echo "
    <p>
        <a href=\"/editLogLevel/new\" class=\"btn btn-success btn-sm\" role=\"button\" >
            Insert Log Level
        </a>
    </p>

    <table class=\"";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["tableTypeClass"]) ? $context["tableTypeClass"] : $this->getContext($context, "tableTypeClass")), "html", null, true);
        echo "\">
        ";
        // line 11
        $this->loadTemplate("frontEnd/partials/standard/tableHeader.html.twig", "frontEnd/logsList.html.twig", 11)->display(array("headerItems" => array(0 => "id", 1 => "name", 2 => " ", 3 => " ")));
        // line 14
        echo "
        ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : $this->getContext($context, "list")));
        foreach ($context['_seq'] as $context["_key"] => $context["logLevel"]) {
            // line 16
            echo "            <tr>
                <td>";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute($context["logLevel"], "id", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($context["logLevel"], "name", array()), "html", null, true);
            echo "</td>
                <td width=\"10%\">
                    <a href=\"/editLogLevel/";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($context["logLevel"], "id", array()), "html", null, true);
            echo "\"  class=\"btn btn-primary btn-sm\" role=\"button\">
                        Edit
                    </a>
                </td>

                <td width=\"10%\">
                    <a href=\"/deleteLogLevel/";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($context["logLevel"], "id", array()), "html", null, true);
            echo "\"  class=\"btn btn-danger btn-sm\" role=\"button\">
                        Delete
                    </a>
                </td>

            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['logLevel'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "    </table>
";
        
        $__internal_da135a334e8f6dff23ead5df0726bb7dccd2a889ec1205557dca0419dc7a10de->leave($__internal_da135a334e8f6dff23ead5df0726bb7dccd2a889ec1205557dca0419dc7a10de_prof);

    }

    public function getTemplateName()
    {
        return "frontEnd/logsList.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 33,  83 => 26,  74 => 20,  69 => 18,  65 => 17,  62 => 16,  58 => 15,  55 => 14,  53 => 11,  49 => 10,  40 => 3,  34 => 2,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* {% block body %}*/
/* */
/*     <p>*/
/*         <a href="/editLogLevel/new" class="btn btn-success btn-sm" role="button" >*/
/*             Insert Log Level*/
/*         </a>*/
/*     </p>*/
/* */
/*     <table class="{{ tableTypeClass }}">*/
/*         {% include 'frontEnd/partials/standard/tableHeader.html.twig'*/
/*         with {'headerItems': [ 'id' , 'name' , ' ' , ' '] } only*/
/*         %}*/
/* */
/*         {% for logLevel in list %}*/
/*             <tr>*/
/*                 <td>{{ logLevel.id }}</td>*/
/*                 <td>{{ logLevel.name }}</td>*/
/*                 <td width="10%">*/
/*                     <a href="/editLogLevel/{{ logLevel.id }}"  class="btn btn-primary btn-sm" role="button">*/
/*                         Edit*/
/*                     </a>*/
/*                 </td>*/
/* */
/*                 <td width="10%">*/
/*                     <a href="/deleteLogLevel/{{ logLevel.id }}"  class="btn btn-danger btn-sm" role="button">*/
/*                         Delete*/
/*                     </a>*/
/*                 </td>*/
/* */
/*             </tr>*/
/*         {% endfor %}*/
/*     </table>*/
/* {% endblock %}*/
/* */
/* */
