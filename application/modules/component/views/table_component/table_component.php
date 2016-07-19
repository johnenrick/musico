<div class="tableComponent">
   
    <form class="filterResultForm" method="POST" style="display:none">
        <div class="row">
            <div class="input-field col s12 m4 l3 ">
                <input id="password" type="password" class="validate">
                <label for="password">Password</label>
            </div>
        </div>
        <div class="row">
            <div class="col s12  center">
                <button class="filterResult btn waves-light">Filter Result</button>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col s12">
            <table>
                <thead>
                    <tr>
                        <td>
                            <button class="btn openFilter"><i class="fa fa-filter" aria-hidden="true"></i> Filter</button>
                            <button class="btn closeFilter" style="display:none"> Close Filter</button>
                        </td>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                    <tr>
                        <td>
                            <span class="resultCount">1</span> Result
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="prototype">
        <table>
            <tr>
                <th class="tableHead" table_column="" sort="none">
                    <span class="columnDescription"></span>
                    <i class="fa fa-sort" aria-hidden="true" ></i>
                    <i class="fa fa-sort-asc" aria-hidden="true" style="display:none"></i>
                    <i class="fa fa-sort-desc" aria-hidden="true" style="display:none"></i>
                </th>
            </tr>
        </table>
    </div>
</div>