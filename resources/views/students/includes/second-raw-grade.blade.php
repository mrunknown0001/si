<div class="modal fade text-left" id="second" role="dialog">
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
                            <td>{{ $sqg->w1 }}</td>
                            <td>{{ $sqg->w2 }}</td>
                            <td>{{ $sqg->w3 }}</td>
                            <td>{{ $sqg->w4 }}</td>
                            <td>{{ $sqg->w5 }}</td>
                            <td>{{ $sqg->w6 }}</td>
                            <td>{{ $sqg->w7 }}</td>
                            <td>{{ $sqg->w8 }}</td>
                            <td>{{ $sqg->w9 }}</td>
                            <td>{{ $sqg->w10 }}</td>
                            <td>{{ $sqg->wtotal }}</td>
                            <td>{{ $sqg->wps }}</td>
                            <td>{{ $sqg->wws }}</td>
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
                            <td>{{ $sqg->p1 }}</td>
                            <td>{{ $sqg->p2 }}</td>
                            <td>{{ $sqg->p3 }}</td>
                            <td>{{ $sqg->p4 }}</td>
                            <td>{{ $sqg->p5 }}</td>
                            <td>{{ $sqg->p6 }}</td>
                            <td>{{ $sqg->p7 }}</td>
                            <td>{{ $sqg->p8 }}</td>
                            <td>{{ $sqg->p9 }}</td>
                            <td>{{ $sqg->p10 }}</td>
                            <td>{{ $sqg->ptotal }}</td>
                            <td>{{ $sqg->pps }}</td>
                            <td>{{ $sqg->pws }}</td>
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
                            <td>{{ $sqg->q }}</td>
                            <td>{{ $sqg->qps }}</td>
                            <td>{{ $sqg->qws }}</td>
                        </tr>
                    </tbody>
                </table>

                <strong>Initial Grade: {{ $sqg->initial }}</strong>
                <br/>
                <strong>Second Quarter Grade: {{ $sqg->grade }}</strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>