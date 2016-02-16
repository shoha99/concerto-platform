#This page lists special topics that have arisen as specific tests have been developed.

## How to auto-submit your form after 5 seconds? ##

Insert the following javascript into the html of the form that you would like to autosubmit:

```
<script type="text/javascript"> 
<!-- var wait=setTimeout("test.submit('timeout');", 5000); //-->
</script>
```

This will cause the form to be automatically submitted after 5 seconds. This script will not work on all browsers as some browsers prevent automatic form submission for security reasons.