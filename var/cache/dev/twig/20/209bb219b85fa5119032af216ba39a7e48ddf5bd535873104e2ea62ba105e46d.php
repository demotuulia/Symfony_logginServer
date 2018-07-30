<?php

/* frontEnd/userlist.html.twig */
class __TwigTemplate_8a0dbcb700e7c4af5d7c82667273fec0fbd0ed20116f153e10300b211b69da42 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "frontEnd/userlist.html.twig", 1);
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
        $__internal_3bfb223d6f6910e7525db630594fac5a8adc1d6f56771a6084c6894ff8ddcb19 = $this->env->getExtension("native_profiler");
        $__internal_3bfb223d6f6910e7525db630594fac5a8adc1d6f56771a6084c6894ff8ddcb19->enter($__internal_3bfb223d6f6910e7525db630594fac5a8adc1d6f56771a6084c6894ff8ddcb19_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "frontEnd/userlist.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_3bfb223d6f6910e7525db630594fac5a8adc1d6f56771a6084c6894ff8ddcb19->leave($__internal_3bfb223d6f6910e7525db630594fac5a8adc1d6f56771a6084c6894ff8ddcb19_prof);

    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        $__internal_576b5fd64f6bf1e30093b38189ac01a10281c6c9f93c0fed7eb73f77c71b0c4e = $this->env->getExtension("native_profiler");
        $__internal_576b5fd64f6bf1e30093b38189ac01a10281c6c9f93c0fed7eb73f77c71b0c4e->enter($__internal_576b5fd64f6bf1e30093b38189ac01a10281c6c9f93c0fed7eb73f77c71b0c4e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 3
        echo "
    <p>
        <a href=\"/edituser/new\" class=\"btn btn-success btn-sm\" role=\"button\" >
            Insert User
        </a>
    </p>

    <table class=\"";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["tableTypeClass"]) ? $context["tableTypeClass"] : $this->getContext($context, "tableTypeClass")), "html", null, true);
        echo "\">
        ";
        // line 11
        $this->loadTemplate("frontEnd/partials/standard/tableHeader.html.twig", "frontEnd/userlist.html.twig", 11)->display(array("headerItems" => array(0 => "id", 1 => "Name", 2 => "Role", 3 => "Email", 4 => " ", 5 => " ")));
        // line 14
        echo "
        
        ";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : $this->getContext($context, "list")));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 17
            echo "            <tr>
                <td>";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "id", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "username", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "email", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "role", array()), "html", null, true);
            echo "</td>
                <td>
                    <a href=\"/edituser/";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "id", array()), "html", null, true);
            echo "\"  class=\"btn btn-primary btn-sm\" role=\"button\">
                        Edit
                    </a>
                </td>

                <td>
                    <a href=\"/deleteuser/";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "id", array()), "html", null, true);
            echo "\"  class=\"btn btn-danger btn-sm\" role=\"button\">
                        Delete
                    </a>
                </td>

            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "    </table>
";
        
        $__internal_576b5fd64f6bf1e30093b38189ac01a10281c6c9f93c0fed7eb73f77c71b0c4e->leave($__internal_576b5fd64f6bf1e30093b38189ac01a10281c6c9f93c0fed7eb73f77c71b0c4e_prof);

    }

    public function getTemplateName()
    {
        return "frontEnd/userlist.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 36,  92 => 29,  83 => 23,  78 => 21,  74 => 20,  70 => 19,  66 => 18,  63 => 17,  59 => 16,  55 => 14,  53 => 11,  49 => 10,  40 => 3,  34 => 2,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* {% block body %}*/
/* */
/*     <p>*/
/*         <a href="/edituser/new" class="btn btn-success btn-sm" role="button" >*/
/*             Insert User*/
/*         </a>*/
/*     </p>*/
/* */
/*     <table class="{{ tableTypeClass }}">*/
/*         {% include 'frontEnd/partials/standard/tableHeader.html.twig'*/
/*             with {'headerItems': [ 'id' , 'Name' , 'Role', 'Email', ' ' , ' '] } only*/
/*         %}*/
/* */
/*         */
/*         {% for user in list %}*/
/*             <tr>*/
/*                 <td>{{ user.id }}</td>*/
/*                 <td>{{ user.username }}</td>*/
/*                 <td>{{ user.email }}</td>*/
/*                 <td>{{ user.role }}</td>*/
/*                 <td>*/
/*                     <a href="/edituser/{{ user.id }}"  class="btn btn-primary btn-sm" role="button">*/
/*                         Edit*/
/*                     </a>*/
/*                 </td>*/
/* */
/*                 <td>*/
/*                     <a href="/deleteuser/{{ user.id }}"  class="btn btn-danger btn-sm" role="button">*/
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
