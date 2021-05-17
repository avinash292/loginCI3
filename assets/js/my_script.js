function mark_All(obj)
        {
            //alert("hiii");
            
            var frm=this.document.property_details;
            var frm_len=frm.elements.length;
            for(var i=0; i<frm_len; i++)
            {
                if(frm.elements[i].type=="checkbox" && frm.elements[i].name=="property_id[]")
                {
                    frm.elements[i].checked=obj.checked;
                }
            }
            
        }

    ////////Delete All stident//////////
        function delete_all()
        {
            if(confirm("Are You Sure To Delete All Selected Records"))
            {
                document.property_details.act.value="delete_multi_property";
                document.property_details.submit();
            }
        }

        function printout()
    {
        window.print();
    }

    function delete_property(p_id)
        {
            if(confirm("Are You Sure To Delete ?"))
            {   
                document.property_details.act.value="del_property";
                document.property_details.p_id.value=p_id;
                document.property_details.submit();
            }

        }
