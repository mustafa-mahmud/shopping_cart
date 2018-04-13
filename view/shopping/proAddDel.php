<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div id="cartModal" class="modal fade" role="dialog" style="top: 30px !important;">
                    <div class="modal-dialog" style="width: 90% !important">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h3 class="modal-title text-capitalize"><span class="glyphicon glyphicon-shopping-cart"></span><a href="javascript:void(0);" id="msg" class="badge badge-success msg" data-trigger="focus" data-toggle="popover" data-placement="bottom" data-content="No Saved Products">0</a>&nbsp;your carts</h3>
                            </div>
                            <div class="modal-body">
                                <div class="checkout table-responsive">
                                    <table class="table table-responsive text-center">
                                        <thead>
                                            <tr>
                                                <th>image</th>
                                                <th>name</th>
                                                <th>price</th>
                                                <th>quantity</th>
                                                <th>delete</th>
                                                <th>sub total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="clonePro">
                                            <tr id="calculation">
                                                <td></td>
                                                <td></td>
                                                <td class="text-capitalize">total products</td>
                                                <td class="totalPro stCho">0</td>
                                                <td class="text-capitalize">total amount</td>
                                                <td class="totalAmo stCho">0$</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <p id="demoPro"></p>
                                <button class="pull-right btn btn-success btn-lg saveTemp">save temp</button>
                                <button data-toggle="popover" data-placement="left"  class="pull-right btn btn-lg btn-success samePerma"><a href="javascript:void(0);">save permanent & buy</a></button>
                            </div>
                            <div class="modal-footer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
