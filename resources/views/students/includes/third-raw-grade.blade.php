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
                            <td>{{ $tqg->w1 }}</td>
                            <td>{{ $tqg->w2 }}</td>
                            <td>{{ $tqg->w3 }}</td>
                            <td>{{ $tqg->w4 }}</td>
                            <td>{{ $tqg->w5 }}</td>
                            <td>{{ $tqg->w6 }}</td>
                            <td>{{ $tqg->w7 }}</td>
                            <td>{{ $tqg->w8 }}</td>
                            <td>{{ $tqg->w9 }}</td>
                            <td>{{ $tqg->w10 }}</td>
                            <td>{{ $tqg->wtotal }}</td>
                            <td>{{ $tqg->wps }}</td>
                            <td>{{ $tqg->wws }}</td>
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
                            <td>{{ $tqg->p1 }}</td>
                            <td>{{ $tqg->p2 }}</td>
                            <td>{{ $tqg->p3 }}</td>
                            <td>{{ $tqg->p4 }}</td>
                            <td>{{ $tqg->p5 }}</td>
                            <td>{{ $tqg->p6 }}</td>
                            <td>{{ $tqg->p7 }}</td>
                            <td>{{ $tqg->p8 }}</td>
                            <td>{{ $tqg->p9 }}</td>
                            <td>{{ $tqg->p10 }}</td>
                            <td>{{ $tqg->ptotal }}</td>
                            <td>{{ $tqg->pps }}</td>
                            <td>{{ $tqg->pws }}</td>
                        </tr>
                    </tbody>
                    
                </table>

                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th colspan="3" class="text-center">Quarterly Assesment</th>
                        </tr>
                        <tr>
                            <th class="text-center">1</th>
                            <th class="text-center">PS</th>
                            <th class="text-center">WS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $tqg->q }}</td>
                            <td>{{ $tqg->qps }}</td>
                            <td>{{ $tqg->qws }}</td>
                        </tr>
                    </tbody>
                </table>

                <strong>Initial Grade: {{ $tqg->initial }}</strong>
                <br/>
                <strong>Third Quarter Grade: {{ $tqg->grade }}</strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>