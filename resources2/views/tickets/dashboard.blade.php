@extends('tickets.master')

@section('title')
    Korrekto - Das Korrektursystem 
@endsection

@section('content')
<div class="row">
  <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
          <div class="card-body ">
              <div class="row">
                  <div class="col-5 col-md-4">
                      <div class="icon-big text-center icon-warning">
                          <i class="nc-icon nc-globe text-warning"></i>
                      </div>
                  </div>
                  <div class="col-7 col-md-8">
                      <div class="numbers">
                          <p class="card-category">Offene Anträge</p>
                          <p class="card-title">156
                              <p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="card-footer ">
              <hr>
              <div class="stats">
                  <i class="fa fa-refresh"></i> Gesamt
              </div>
          </div>
      </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
          <div class="card-body ">
              <div class="row">
                  <div class="col-5 col-md-4">
                      <div class="icon-big text-center icon-warning">
                          <i class="nc-icon nc-money-coins text-success"></i>
                      </div>
                  </div>
                  <div class="col-7 col-md-8">
                      <div class="numbers">
                          <p class="card-category">Priority High</p>
                          <p class="card-title">14
                              <p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="card-footer ">
              <hr>
              <div class="stats">
                  <i class="fa fa-calendar-o"></i> Gesamt
              </div>
          </div>
      </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
          <div class="card-body ">
              <div class="row">
                  <div class="col-5 col-md-4">
                      <div class="icon-big text-center icon-warning">
                          <i class="nc-icon nc-vector text-danger"></i>
                      </div>
                  </div>
                  <div class="col-7 col-md-8">
                      <div class="numbers">
                          <p class="card-category">Neue Anträge</p>
                          <p class="card-title">23
                              <p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="card-footer ">
              <hr>
              <div class="stats">
                  <i class="fa fa-clock-o"></i> Seit gestern
              </div>
          </div>
      </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
          <div class="card-body ">
              <div class="row">
                  <div class="col-5 col-md-4">
                      <div class="icon-big text-center icon-warning">
                          <i class="nc-icon nc-favourite-28 text-primary"></i>
                      </div>
                  </div>
                  <div class="col-7 col-md-8">
                      <div class="numbers">
                          <p class="card-category">In Bearbeitung</p>
                          <p class="card-title">82
                              <p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="card-footer ">
              <hr>
              <div class="stats">
                  <i class="fa fa-refresh"></i> Gesamt
              </div>
          </div>
      </div>
  </div>
</div>
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Korrekturanträge</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>
                  Modul
                </th>
                <th>
                  Priorität
                </th>
                <th>
                  Status
                </th>
                <th class="text-right">
                  Bearbeiten
                </th>
              </thead>
              @unless($tickets->isEmpty())
                    @foreach ($tickets as $ticket)
                            <tbody>

                                <tr >
                                    <td class="text-left"> 
                                           {{$ticket->modul}}                                      
                                    </td>
                                    <td class="text-left"> 
                                           {{$ticket->priority}}                                      
                                    </td>
                                     <td class="text-left"> 
                                           {{$ticket->status}}                                      
                                    </td>
                                    <td class="text-right">
                                        <a href="/listings/{{$ticket->id}}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i
                                          class="now-ui-icons loader_gear"></i>
                                            Bearbeiten</a>
                                    </td>
                                    
                                </tr>
                    @endforeach
                @else
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <p class="text-center">Keine Tickets gefunden</p>
                        </td>
                    </tr>
                    @endunless

                    </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
    
@endsection

