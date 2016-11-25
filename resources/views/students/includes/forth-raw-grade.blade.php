<div class="modal fade text-left" id="first" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Raw Grade</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th colspan="13" class="text-center">Writen Works</th>
                        </tr>
                        <tr>
                            <th class="text-center">1</th>
                            <th class="text-center">2</th>
                            <th class="text-center">3</th>
                            <th class="text-center">4</th>
                            <th class="text-center">7</th>
                            <th class="text-center">6</th>
                            <th class="text-center">7</th>
                            <th class="text-center">8</th>
                            <th class="text-center">9</th>
                            <th class="text-center">10</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">PS</th>
                            <th class="text-center">WS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $fqg->w1 }}</td>
                            <td>{{ $fqg->w2 }}</td>
                            <td>{{ $fqg->w3 }}</td>
                            <td>{{ $fqg->w4 }}</td>
                            <td>{{ $fqg->w5 }}</td>
                            <td>{{ $fqg->w6 }}</td>
                            <td>{{ $fqg->w7 }}</td>
                            <td>{{ $fqg->w8 }}</td>
                            <td>{{ $fqg->w9 }}</td>
                            <td>{{ $fqg->w10 }}</td>
                            <td>{{ $fqg->wtotal }}</td>
                            <td>{{ $fqg->wps }}</td>
                            <td>{{ $fqg->wws }}</td>
                        </tr>
                    </tbody>
                </table>

                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th colspan="13" class="text-center">Performance Tasks</th>
                        </tr>
                        <tr>
                            <th class="text-center">1</th>
                            <th class="text-center">2</th>
                            <th class="text-center">3</th>
                            <th class="text-center">4</th>
                            <th class="text-center">7</th>
                            <th class="text-center">6</th>
                            <th class="text-center">7</th>
                            <th class="text-center">8</th>
                            <th class="text-center">9</th>
                            <th class="text-center">10</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">PS</th>
                            <th class="text-center">WS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $fqg->p1 }}</td>
                            <td>{{ $fqg->p2 }}</td>
                            <td>{{ $fqg->p3 }}</td>
                            <td>{{ $fqg->p4 }}</td>
                            <td>{{ $fqg->p5 }}</td>
                            <td>{{ $fqg->p6 }}</td>
                            <td>{{ $fqg->p7 }}</td>
                            <td>{{ $fqg->p8 }}</td>
                            <td>{{ $fqg->p9 }}</td>
                            <td>{{ $fqg->p10 }}</td>
                            <td>{{ $fqg->ptotal }}</td>
                            <td>{{ $fqg->pps }}</td>
                            <td>{{ $fqg->pws }}</td>
                        </tr>
                    </tbody>
                    
                </table>

                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th colspan="3" class="text-center">Quarterly Assessment</th>
                        </tr>
                        <tr>
                            <th class="text-center">1</th>
                            <th class="text-center">PS</th>
                            <th class="text-center">WS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $fqg->q }}</td>
                            <td>{{ $fqg->qps }}</td>
                            <td>{{ $fqg->qws }}</td>
                        </tr>
                    </tbody>
                </table>

                <strong>Initial Grade: {{ $fqg->initial }}</strong>
                <br/>
                <strong>Fourth Quarter Grade: {{ $fqg->grade }}</strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>