<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 6/13/16
 * Time: 20:03
 */
?>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">@yield('modal_header')</h4>
            </div>
            <div class="modal-body">
                @section('content')

                @show
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
