<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* base.html.twig */
class __TwigTemplate_cb4fcaa66bed4ac78176822d6a140766cf7de46c8b7f30143b853da695db3721 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'javascripts' => [$this, 'block_javascripts'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

       
        ";
        // line 10
        echo "        ";
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 21
        echo "
        ";
        // line 22
        $this->displayBlock('javascripts', $context, $blocks);
        // line 30
        echo "    </head>

  
        ";
        // line 33
        $this->displayBlock('body', $context, $blocks);
        // line 91
        echo "   
</html>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 5
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 10
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 11
        echo "            ";
        // line 12
        echo "                <link href=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/boxicons.min.css"), "html", null, true);
        echo "\"  rel=\"stylesheet\" type=\"text/css\">
                <link href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/boxicons.css"), "html", null, true);
        echo "\"  rel=\"stylesheet\" type=\"text/css\">
                <link href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/animations.css"), "html", null, true);
        echo "\"  rel=\"stylesheet\" type=\"text/css\">
                <link href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/transformations.css"), "html", null, true);
        echo "\"  rel=\"stylesheet\" type=\"text/css\">
                <link href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/googleapis.css"), "html", null, true);
        echo "\"  rel=\"stylesheet\" type=\"text/css\">
                <link href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/bootstrap.min.css"), "html", null, true);
        echo "\"  rel=\"stylesheet\" type=\"text/css\" integrity=\"sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC\" crossorigin=\"anonymous\">
        

        ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 22
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 23
        echo "            ";
        // line 24
        echo "             <script src=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/jquery.min.js"), "html", null, true);
        echo "\"></script>
             <script src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/jquery.dataTables.min.js"), "html", null, true);
        echo "\"></script>
             <script src=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/bootstrap.bundle.min.js"), "html", null, true);
        echo "\"></script>
             <script src=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/jquery-3.5.1.js"), "html", null, true);
        echo "\"></script>
             <script src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/script.js"), "html", null, true);
        echo "\"></script>
        ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 33
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 34
        echo "          <body>
            <div class=\"sidebar\">
                <div class=\"logo-details\">
                    <i style=\"content: url(";
        // line 37
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Images/restaurant-sharp.svg"), "html", null, true);
        echo ");width=28;height=28;\" class='bx bxl-c'></i>
                    <span class=\"logo_name\">Casis</span>
                </div>
            <ul class=\"nav-links\">
                <li>
                    <a href=\"";
        // line 42
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
        echo "\">
                        <i class='bx bx-leaf'></i>
                        <span class=\"links_name\">Caisse</span>
                    </a>
                </li>

                <li>
                    <a href=\"#\">
                        <i class='bx bx-store-alt'></i>
                        <span class=\"links_name\">Cartes</span>
                    </a>
                </li>

                <li>
                    <a href=\"";
        // line 56
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
        echo "\">
                        <i class='bx bx-square'></i>
                        <span class=\"links_name\">Product</span>
                    </a>
                </li>
                <li>
                    <a href=\"#\">
                        <i class='bx bx-edit'></i>
                        <span class=\"links_name\">Client</span>
                    </a>
                </li>

                <li>
                    <a href=\"#\">
                        <i class='bx bx-pause'></i>
                        <span class=\"links_name\">Analytics</span>
                    </a>
                </li>
                <li>
                    <a href=\"#\">
                        <i class='bx bx-hdd'></i>
                        <span class=\"links_name\">Stock</span>
                    </a>
                </li>
                <li class=\"log_out\">
                    <a href=\"#\">
                        <i class='bx bx-log-out'></i>
                        <span class=\"links_name\">Log out</span>
                    </a>
                </li>
            </ul>
        </div>
    </body>

        ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  233 => 56,  216 => 42,  208 => 37,  203 => 34,  193 => 33,  181 => 28,  177 => 27,  173 => 26,  169 => 25,  164 => 24,  162 => 23,  152 => 22,  138 => 17,  134 => 16,  130 => 15,  126 => 14,  122 => 13,  117 => 12,  115 => 11,  105 => 10,  86 => 5,  74 => 91,  72 => 33,  67 => 30,  65 => 22,  62 => 21,  59 => 10,  53 => 5,  47 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <title>{% block title %}Welcome!{% endblock %}</title>

       
        {# Run `composer require symfony/webpack-encore-bundle`
           and uncomment the following Encore helpers to start using Symfony UX #}
        {% block stylesheets %}
            {#{{ encore_entry_link_tags('app') }}#}
                <link href=\"{{ asset('css/boxicons.min.css') }}\"  rel=\"stylesheet\" type=\"text/css\">
                <link href=\"{{ asset('css/boxicons.css') }}\"  rel=\"stylesheet\" type=\"text/css\">
                <link href=\"{{ asset('css/animations.css') }}\"  rel=\"stylesheet\" type=\"text/css\">
                <link href=\"{{ asset('css/transformations.css') }}\"  rel=\"stylesheet\" type=\"text/css\">
                <link href=\"{{ asset('css/googleapis.css') }}\"  rel=\"stylesheet\" type=\"text/css\">
                <link href=\"{{ asset('css/bootstrap.min.css') }}\"  rel=\"stylesheet\" type=\"text/css\" integrity=\"sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC\" crossorigin=\"anonymous\">
        

        {% endblock %}

        {% block javascripts %}
            {#{{ encore_entry_script_tags('app') }}#}
             <script src=\"{{ asset('js/jquery.min.js') }}\"></script>
             <script src=\"{{ asset('js/jquery.dataTables.min.js') }}\"></script>
             <script src=\"{{ asset('js/bootstrap.bundle.min.js') }}\"></script>
             <script src=\"{{ asset('js/jquery-3.5.1.js') }}\"></script>
             <script src=\"{{ asset('js/script.js') }}\"></script>
        {% endblock %}
    </head>

  
        {% block body %}
          <body>
            <div class=\"sidebar\">
                <div class=\"logo-details\">
                    <i style=\"content: url({{ asset('Images/restaurant-sharp.svg') }});width=28;height=28;\" class='bx bxl-c'></i>
                    <span class=\"logo_name\">Casis</span>
                </div>
            <ul class=\"nav-links\">
                <li>
                    <a href=\"{{ path('home') }}\">
                        <i class='bx bx-leaf'></i>
                        <span class=\"links_name\">Caisse</span>
                    </a>
                </li>

                <li>
                    <a href=\"#\">
                        <i class='bx bx-store-alt'></i>
                        <span class=\"links_name\">Cartes</span>
                    </a>
                </li>

                <li>
                    <a href=\"{{ path('home') }}\">
                        <i class='bx bx-square'></i>
                        <span class=\"links_name\">Product</span>
                    </a>
                </li>
                <li>
                    <a href=\"#\">
                        <i class='bx bx-edit'></i>
                        <span class=\"links_name\">Client</span>
                    </a>
                </li>

                <li>
                    <a href=\"#\">
                        <i class='bx bx-pause'></i>
                        <span class=\"links_name\">Analytics</span>
                    </a>
                </li>
                <li>
                    <a href=\"#\">
                        <i class='bx bx-hdd'></i>
                        <span class=\"links_name\">Stock</span>
                    </a>
                </li>
                <li class=\"log_out\">
                    <a href=\"#\">
                        <i class='bx bx-log-out'></i>
                        <span class=\"links_name\">Log out</span>
                    </a>
                </li>
            </ul>
        </div>
    </body>

        {% endblock %}
   
</html>
", "base.html.twig", "C:\\xampp\\htdocs\\restaurant_VF\\templates\\base.html.twig");
    }
}
