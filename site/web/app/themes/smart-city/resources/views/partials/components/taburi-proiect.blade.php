<ul
  class="nav nav-tabs justify-content-center"
  id="taburiProiect"
  role="tablist">
  <li class="nav-item">
    <a
      class="nav-link active"
      id="descriere-tab"
      data-toggle="tab"
      href="#descriere"
      role="tab"
      aria-controls="descriere"
      aria-selected="true">
      Descriere
    </a>
  </li>
  @if (Proiect::specificatii())
    <li class="nav-item">
      <a
        class="nav-link"
        id="specificatii-tab"
        data-toggle="tab"
        href="#specificatii"
        role="tab"
        aria-controls="specificatii"
        aria-selected="false">
        Specificații
      </a>
    </li>
  @endif
  @if (Proiect::protocol())
    <li class="nav-item">
      <a
        class="nav-link"
        id="protocol-tab"
        data-toggle="tab"
        href="#protocol"
        role="tab"
        aria-controls="protocol"
        aria-selected="false">
        Protocol
      </a>
    </li>
  @endif
  @if (Proiect::media())
    <li class="nav-item">
      <a
        class="nav-link"
        id="media-tab"
        data-toggle="tab"
        href="#media"
        role="tab"
        aria-controls="media"
        aria-selected="false">
        Media
      </a>
    </li>
  @endif
  @if (Proiect::noutati())
    <li class="nav-item">
      <a
        class="nav-link"
        id="noutati-tab"
        data-toggle="tab"
        href="#noutati"
        role="tab"
        aria-controls="noutati"
        aria-selected="false">
        Noutăți
      </a>
    </li>
  @endif
  @if (Proiect::altceva())
    <li class="nav-item">
      <a
        class="nav-link"
        id="altceva-tab"
        data-toggle="tab"
        href="#altceva"
        role="tab"
        aria-controls="altceva"
        aria-selected="false">
        Altceva
      </a>
    </li>
  @endif
</ul>
<div class="tab-content" id="taburiProiectContent">
  <div
    class="tab-pane fade show active"
    id="descriere"
    role="tabpanel"
    aria-labelledby="descriere-tab">
    <h3>Detaliu Soluție/Proiect</h3>
    {!! Proiect::descriere() !!}
  </div>
  @if (Proiect::specificatii())
    <div
      class="tab-pane fade"
      id="specificatii"
      role="tabpanel"
      aria-labelledby="specificatii-tab">
      <h3>Specificații tehnice</h3>
      {!! Proiect::specificatii() !!}
    </div>
  @endif
  @if (Proiect::protocol())
    <div
      class="tab-pane fade"
      id="protocol"
      role="tabpanel"
      aria-labelledby="protocol-tab">
      <h3>Protocol de colaborare</h3>
      {!! Proiect::protocol() !!}
    </div>
  @endif
  @if (Proiect::media())
    <div
      class="tab-pane fade"
      id="media"
      role="tabpanel"
      aria-labelledby="media-tab">
      <h3>{{ Proiect::nume() }} în media</h3>
      {!! Proiect::media() !!}
    </div>
  @endif
  @if (Proiect::noutati())
    <div
      class="tab-pane fade"
      id="noutati"
      role="tabpanel"
      aria-labelledby="noutati-tab">
      {!! Proiect::noutati() !!}
    </div>
  @endif
  @if (Proiect::altceva())
    <div
      class="tab-pane fade"
      id="altceva"
      role="tabpanel"
      aria-labelledby="altceva-tab">
      {!! Proiect::altceva() !!}
    </div>
  @endif
</div>