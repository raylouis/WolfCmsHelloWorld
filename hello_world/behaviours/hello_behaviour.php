
	   <?php
/* Security measure */
if (!defined('IN_CMS')) {
    exit();
}

class Hello
{
    public function __construct(&$page, $params)
    {
        //The page called
        $this->page =& $page;
        //The parameters passed as a path to the page
        $this->params    = $params;
        //Retrieve the original content just to get better what to do
        $originalContent = $this->page->part->body->content_html;
        //Retrieve the caller uri
        $callerUri       = $this->page->getUri();
      
        switch (count($params)) {
            case 2:
                //This starts from a request like  wolfcms/{page_name}/say_hello/{hello_name}
                $say_hello  = $params[0];
                $say_hello_to = $params[1];
                if ($say_hello == "say_hello") {
                    $this->page->part->body->content_html = new View('../../plugins/' . 'hello_world' . '/views/say_hello', array(
                        'say_hello_to' => $say_hello_to,
                        'originalContent' => $originalContent,
                        "callerUri" => $callerUri
                    ));
                    //The parameters will be passed to view as variables
                } else {
                    page_not_found();
                }
                break;
            case 1:
                //It's a request, the value of say_hello parameter will be passed through post/get
                $say_hello  = $params[0];
                $say_hello_to = $_REQUEST["say_hello_to"];
                if ($say_hello == "say_hello") {
                    $this->page->part->body->content_html = new View('../../plugins/' . 'hello_world' . '/views/say_hello', array(
                        'say_hello_to' => $say_hello_to,
                        'originalContent' => $originalContent,
                        "callerUri" => $callerUri
                    ));
                    //The parameters will be passed to view as variables
                } else {
                    page_not_found();
                }
                break;
            case 0:
                //No parameters, the default page will be shown
                $this->page->part->body->content_html = new View('../../plugins/' . 'hello_world' . '/views/set_hello_receiver', array(
                    'originalContent' => $originalContent,
                    "callerUri" => $callerUri
                ));
                break;
            default:
                page_not_found();
                break;
        }
    }
    
}

/*
This will be used only by children pages
*/
class PageHello extends Page
{
    protected function setUrl()
    {
        $this->url = trim($this->parent->url . '/' . $this->slug, '/');
    }
    
    public function title()
    {
        return $this->title . ", This is an hello page!!";
    }
    
    public function breadcrumb()
    {
        return $this->breadcrumb;
    }
}
?>