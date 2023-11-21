<?php
require_once("config/db.php");
require_once("php/header2.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>OnTrad Homepage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/ontrad.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

  <style type="text/css">
    input.larger {
      transform: scale(1.75);
      margin-bottom: 5%;
    }
  </style>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

  <div class="wrapper pt-1">
    <div class="container-fluid p-3" style="text-align: center;"><img src="images/ontradlogo.jpg" style="width: 50%; height: auto;">
    </div>
    <div class="container-fluid" style="padding: 0% 10% 1% 10%;">
      <h5 style="line-height: 120%;"><small>Welcome to the Ontario Traditional Music Library. This resource has
          been created especially for singers and instrumentalists looking for songs and tunes from Ontario's
          living
          musical traditions and for music from historical sources.</small></h5>
    </div>
    <!--general search-->
    <div class="ontradgreenlite ontradred p-2">
      <!--main search box-->
      <form style="padding: 2% 15%;">
        <div class="input-group">
          <input type="search" class="form-control" size="40" placeholder="Search by titles or keywords">
        </div>
      </form>
      <!--circa nad region-->
      <!--Year Checkbox-->

      <div class="row input-clr ontradred" style="padding: 0% 15%;">
        <div class="col-sm-6" style="text-align: center;">
          <select class="form-select form-select-sm mb-1" aria-label=".form-select-sm example" name="circa">
            <option value="">Circa</option>
            <option value="1750-1799">1750-1799</option>
            <option value="1800-1849">1800-1849</option>
            <option value="1849-1900">1850-1900</option>
            <option value="1900-1949">1900-1949</option>
            <option value="1950-1999">1950-1999</option>
          </select>
        </div>
        <div class="col-sm-6" style="text-align: center;">
          <select class="form-select form-select-sm mb-1" aria-label=".form-select-sm example" name="region">
            <option value="">Region</option>
            <option value="East">East</option>
            <option value="South Central">South Central</option>
            <option value="South West">South West</option>
            <option value="Central">Central</option>
            <option value="North">North</option>
          </select>
        </div>
      </div>
      <!--checkboxes-->
      <div class="row" style="text-align: center; padding: 2% 15%;">
        <div class="col-sm-4 p-0">
          <label for="scores">
            <h5>Instrumentals&nbsp;</h5>
          </label>
          <input type="checkbox" class="larger" id="scores" onclick="myFunction()">
          <p id="textscores" style="display:none; ">Checkbox is CHECKED!</p>
        </div>
        <div class="col-sm-4 p-0">
          <label for="Songs">
            <h5>Songs&nbsp; </h5>
          </label>
          <input type="checkbox" class="larger" id="songs" onclick="myFunction()">
          <p id="textvideo" style="display:none">Checkbox is CHECKED!</p>
        </div>
        <div class="col-sm-4 p-0">
          <label for="images">
            <h5>Images&nbsp; </h5>
          </label>
          <input type="checkbox" class="larger" id="images" onclick="myFunction()">
          <p id="textimage" style="display:none">Checkbox is CHECKED!</p>
        </div>
      </div>
      <div class="input-group-btn mb-3 mt-0" style="text-align: center;">
        <button type="button" class="button1">Search</button>
      </div>
    </div>
    <!--SCROLLING FIELD OF SONGS A t0 Z-->
    <div class="ontradbg1 pt-2">
      <div class="ontradred py-3" style="text-align: center;">
        <h4>SONGS&nbsp;<!-- reverse order of songs A to Z  &uarr; &nbsp; &darr;</h4>-->
      </div>
      <div class="album">
        <div class="container">
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            <div class="col"><!-- songcard -->
              <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                  <title>Placeholder</title>
                  <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">ONTRAD IMAGE</text>
                </svg>
                <div class="card-body">
                  <h4>Song Title </h4>
                  <small class="text-body-secondary">Circa </small><small class="text-body-secondary"> Region</small>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View Page</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Play Song</button>
                    </div>

                  </div>
                </div>
              </div>
            </div><!-- End of songcard -->
            <div class="col"><!-- songcard -->
              <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                  <title>Placeholder</title>
                  <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">ONTRAD IMAGE</text>
                </svg>
                <div class="card-body">
                  <h4>Song Title </h4>
                  <small class="text-body-secondary">Circa </small><small class="text-body-secondary"> Region</small>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View Page</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Play Song</button>
                    </div>

                  </div>
                </div>
              </div>
            </div><!-- End of songcard -->
            <div class="col"><!-- songcard -->
              <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                  <title>Placeholder</title>
                  <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">ONTRAD IMAGE</text>
                </svg>
                <div class="card-body">
                  <h4>Song Title </h4>
                  <small class="text-body-secondary">Circa </small><small class="text-body-secondary"> Region</small>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View Page</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Play Song</button>
                    </div>

                  </div>
                </div>
              </div>
            </div><!-- End of songcard -->

            <div class="col"><!-- songcard -->
              <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                  <title>Placeholder</title>
                  <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">ONTRAD IMAGE</text>
                </svg>
                <div class="card-body">
                  <h4>Song Title </h4>
                  <small class="text-body-secondary">Circa </small><small class="text-body-secondary"> Region</small>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View Page</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Play Song</button>
                    </div>

                  </div>
                </div>
              </div>
            </div><!-- End of songcard -->
            <div class="col"><!-- songcard -->
              <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top tradgreen" width="100%" height="225" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                  <title>Placeholder</title>
                  <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">ONTRAD IMAGE</text>
                </svg>
                <div class="card-body">
                  <h4>Song Title </h4>
                  <small class="text-body-secondary">Circa </small><small class="text-body-secondary"> Region</small>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View Page</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Play Song</button>
                    </div>

                  </div>
                </div>
              </div>
            </div><!-- End of songcard -->
            <div class="col"><!-- songcard -->
              <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                  <title>Placeholder</title>
                  <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">ONTRAD IMAGE</text>
                </svg>
                <div class="card-body">
                  <h4>Song Title </h4>
                  <small class="text-body-secondary">Circa </small><small class="text-body-secondary"> Region</small>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View Page</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Play Song</button>
                    </div>

                  </div>
                </div>
              </div>
            </div><!-- End of songcard -->
            <div class="col"><!-- songcard -->
              <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                  <title>Placeholder</title>
                  <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">ONTRAD IMAGE</text>
                </svg>
                <div class="card-body">
                  <h4>Song Title </h4>
                  <small class="text-body-secondary">Circa </small><small class="text-body-secondary"> Region</small>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View Page</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Play Song</button>
                    </div>

                  </div>
                </div>
              </div>
            </div><!-- End of songcard -->
            <div class="col"><!-- songcard -->
              <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                  <title>Placeholder</title>
                  <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">ONTRAD IMAGE</text>
                </svg>
                <div class="card-body">
                  <h4>Song Title </h4>
                  <small class="text-body-secondary">Circa </small><small class="text-body-secondary"> Region</small>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View Page</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Play Song</button>
                    </div>

                  </div>
                </div>
              </div>
            </div><!-- End of songcard -->
            <div class="col"><!-- songcard -->
              <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                  <title>Placeholder</title>
                  <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">ONTRAD IMAGE</text>
                </svg>
                <div class="card-body">
                  <h4>Song Title </h4>
                  <small class="text-body-secondary">Circa </small><small class="text-body-secondary"> Region</small>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View Page</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Play Song</button>
                    </div>

                  </div>
                </div>
              </div>
            </div><!-- End of songcard -->
          </div>
        </div>
      </div>
        <!-- bottom nav for songs -->
        <hr>
        <div class="container-fluid pl-5" style="width: 100%; text-align: center;">
        <nav aria-label="Page navigation">
            <ul class="pagination">
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>
      </div>
       <!-- end of nav -->
    <br><br></div><!--end of scrolling songlist -->
    <div class="ontradgreenlite ontradred p-4 text-center">
      <h4>FEATURED THEMES</h4>

      <div class="input-group-btn" style="text-align: center;">
        <button type="button" class="button1" onclick="document.location='/themelist.php'">All Themes</button>
      </div>
    </div>
<!--SCROLLING FIELD OF themes A t0 Z-->
<div class="ontragreen pb-5 ">
      <div style="text-align: center;">
          <h4><!-- reverse order of songs A to Z --> &uarr; &nbsp; &darr;</h4> 
      </div>
      <div class="album">
        <div class="container">
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
             
            <div class="col"><!-- songcard -->
              <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">ONTRAD IMAGE</text></svg>
                <div class="card-body">
                  <h4> Title </h4>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View Page</button>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div><!-- End of songcard -->
            <div class="col"><!-- songcard -->
              <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">ONTRAD IMAGE</text></svg>
                <div class="card-body">
                  <h4> Title </h4>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View Page</button>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div><!-- End of songcard -->
            <div class="col"><!-- songcard -->
              <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">ONTRAD IMAGE</text></svg>
                <div class="card-body">
                  <h4> Title </h4>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View Page</button>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div><!-- End of songcard -->

            <div class="col"><!-- songcard -->
              <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">ONTRAD IMAGE</text></svg>
                <div class="card-body">
                  <h4> Title </h4>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View Page</button>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div><!-- End of songcard -->
            <div class="col"><!-- songcard -->
              <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top tradgreen" width="100%" height="225" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">ONTRAD IMAGE</text></svg>
                <div class="card-body">
                  <h4> Title </h4>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View Page</button>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div><!-- End of songcard -->
            <div class="col"><!-- songcard -->
              <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">ONTRAD IMAGE</text></svg>
                <div class="card-body">
                  <h4> Title </h4>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View Page</button>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div><!-- End of songcard -->
            <div class="col"><!-- songcard -->
              <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">ONTRAD IMAGE</text></svg>
                <div class="card-body">
                  <h4> Title </h4>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View Page</button>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div><!-- End of songcard -->
            <div class="col"><!-- songcard -->
              <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">ONTRAD IMAGE</text></svg>
                <div class="card-body">
                  <h4> Title </h4>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View Page</button>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div><!-- End of songcard -->
            <div class="col"><!-- songcard -->
              <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">ONTRAD IMAGE</text></svg>
                <div class="card-body">
                  <h4> Title </h4>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View Page</button>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End of songcard -->
          </div>
        </div>
      </div>
    </div>
    <!-- Container (Contact Section) -->
    <div class="container-fluid ontradgreenlite ontradred py-3" style="width: 100%;">
      <h5 class="text-center">CONTACT US</h5>
      <div class="row">
        <div class="col" style="width: 100%; text-align: center;">
          <h5> mail@ontariotraditionalmusic.ca</h5>
        </div>
      </div>
      <br>
      <!-- Button to Open the Modal -->
      <div style="text-align: center;">
        <button type="button" class="button1" data-toggle="modal" data-target="#dropline">
          Drop us a line
        </button>
      </div>
      <!-- The Modal -->
      <div class="modal" id="dropline">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="alert alert-light m-3" style="padding: 3% 10% 3% 10%">
              <p style="text-align: center;">
                <img src="images/ontradlogo160px.jpg" style="text-align: center;">
                <hr>
                We welcome your comments and suggestions
              </p>
              <div class="row">
                <div class="col-sm-6 form-group">
                  <input class="form-control" style="width: 100%;" id="name" name="name" placeholder="Name" type="text" required>
                </div>
                <div class="col-sm-6 form-group">
                  <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                </div>
              </div>
              <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
              <div class="row">
                <div class="col-sm-12 form-group">
                  <button class="button1 pull-right" type="submit">Send</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br><br>
      <div style="text-align: center;">
        <p><small>- CREATED BY BUSINESSLORE -</small>
        </p>
      </div>
    </div><!--end of contact-->
  </div><!--end of wrapper-->
  <script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
          panel.style.maxHeight = null;
        } else {
          panel.style.maxHeight = panel.scrollHeight + "px";
        }
      });
    }

    function myFunction() {
      var checkBox = document.getElementById("scores");
      var text = document.getElementById("textscores");
      if (checkBox.checked == true) {
        text.style.display = "block";
      } else {
        text.style.display = "none";
      }
    }

    function myFunction() {
      var checkBox = document.getElementById("images");
      var text = document.getElementById("textimages");
      if (checkBox.checked == true) {
        text.style.display = "block";
      } else {
        text.style.display = "none";
      }
    }

    function myFunction() {
      var checkBox = document.getElementById("video");
      var text = document.getElementById("textvideo");
      if (checkBox.checked == true) {
        text.style.display = "block";
      } else {
        text.style.display = "none";
      }
    }

    function myFunction() {
      var checkBox = document.getElementById("load");
      var text = document.getElementById("textload");
      if (checkBox.checked == true) {
        text.style.display = "block";
      } else {
        text.style.display = "none";
      }
    }
  </script>
</body>

</html>