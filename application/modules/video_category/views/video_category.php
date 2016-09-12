<div id="videoCategory" >
    <div id="videoCategoryDetail" class="row white " style="display:none">
        <div class="col s12 ">
            <h5>Video Category</h5>
        </div>
        <form class="col s12" method="POST">
            <input name="ID" type="hidden" >
            <div class="row">
                <div class="input-field col s6">
                    <input field_name="description" placeholder="Placeholder" type="text" class="validate">
                    <label class="active" >Description</label>
                </div>
                <div class="input-field col s6"> 
                    <select field_name="parent_ID" class="validate">
                        
                    </select>
                    <label class="active">Parent Category</label>
                </div>
                
            </div>
            <div class="row">
                <div class="col s12 formActionButton right-align">
                    <label action="delete_confirmation" class="formLabelIndicator label-info pull-left" style="position: relative">Are you sure you want to delete ?   &nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <button action="delete_yes" type="button" class="btn  waves-effect waves-light red  darken-2 pull-left"><i class="fa fa-trash" aria-hidden="true"></i> Yes </button>
                    <button action="delete_no" type="reset" class="btn waves-effect waves-light white darken-1 red-outline pull-left"><i class="fa fa-remove" aria-hidden="true"></i> No </button>
                    <button action="delete" type="button" class="btn  waves-effect waves-light red  darken-2 pull-left"><i class="fa fa-trash" aria-hidden="true"></i> Delete </button>
                    <label class="formLabelIndicator label-success" style="position: relative">Success !</label>
                    <label class="formLabelIndicator label-danger " style="position: relative">Fail !</label>
                    <button action="submit" type="submit" class="btn waves-effect waves-light green darken-1 "><i class="fa fa-save" aria-hidden="true"></i> Save </button>
                    <button action="cancel" type="reset" class="btn waves-effect waves-light white darken-1 red-outline"><i class="fa fa-remove" aria-hidden="true"></i> Close </button>
                    
                </div>
            </div>
        </form>
    </div>
    <div class="row white">
        <div class="input-field  col s12 right-align ">
            <button id="createVideoCategory" class="waves-effect waves-light btn red darken-3 margin-bottom-20"><i class="fa fa-plus" aria-hidden="true"></i> Create Category</button>
            
        </div>
    </div>
    <div class="row">
        <div class="col s12 l12 white">
            <div class="videoCategoryTable">
            </div>
        </div>
    </div>
    <div class="prototype">
        <table>
            <tr class="videoCategoryEntry">
                <td class="description"></td>
                <td class="parentCategory"></td>
                <td class="viewCategory">
                    <button type="reset" class="viewCategoryDetail btn btn-sm waves-effect waves-light blue darken-1 "><i class="fa fa-search" aria-hidden="true"></i> View </button>
                </td>
            </tr>
        </table>
    </div>
</div>