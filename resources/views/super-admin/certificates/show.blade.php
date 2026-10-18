@extends('layouts.student')

@section('title', 'Certificate')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;900&family=Playfair+Display:ital,wght@0,500;0,700;1,500&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

<style>
  :root{
    --navy:#0c1f44;
    --gold:#c9961f;
    --gold-light:#f3d77a;
    --gold-grad:linear-gradient(180deg,#b8861a,#f6df8c 45%,#b8861a);
    --gold-grad-h:linear-gradient(90deg,#b8861a,#f6df8c 25%,#e3b83e 50%,#f6df8c 75%,#b8861a);
  }
  body{background:#0b1b3a;font-family:'Poppins',sans-serif;color:var(--navy)}

  .cert-wrap{display:flex;justify-content:center;padding:12px 0;width:100%;max-width:100%;min-width:0;overflow:hidden}

  /* Fixed A4 landscape canvas (1123 x 794 px = 297 x 210 mm) */
  .certificate{
    position:relative;width:1123px;height:794px;flex:none;overflow:hidden;
    background:radial-gradient(circle at 60% 45%,#ffffff,#fffdf7 55%,#f7f0db);
    box-shadow:0 6px 30px rgba(0,0,0,.35);
  }
  .certificate *{box-sizing:border-box}
  .bg{position:absolute;inset:0;width:100%;height:100%}

  .gold-text{background:var(--gold-grad);-webkit-background-clip:text;background-clip:text;color:transparent}

  /* ---------- Right-top points ---------- */
  .top-points{position:absolute;top:40px;right:42px;width:190px;font-size:11px;font-weight:600;line-height:1}
  .top-points div{display:flex;align-items:center;gap:10px;margin-bottom:14px}
  .top-points i{width:16px;height:16px;border-radius:3px;background:var(--navy);display:inline-block;position:relative}
  .top-points i::after{content:"";position:absolute;left:4px;right:4px;bottom:3px;height:7px;background:var(--gold-light);border-radius:1px}

  /* ---------- Main content ---------- */
  .content{
    position:absolute;left:340px;right:96px;top:26px;bottom:34px;
    display:flex;flex-direction:column;align-items:center;text-align:center;
  }
  .brand{font:900 66px/1 'Cinzel',serif;letter-spacing:1px}
  .brand .s{color:var(--navy)}
  .tagline{font:500 italic 19px 'Playfair Display',serif;color:var(--navy);margin-top:4px}
  .tagline b{font-weight:500;font-style:normal;color:var(--gold)}

  .cert-title{font:700 45px/1.1 'Cinzel',serif;margin-top:16px;letter-spacing:.5px}
  .diamond-line{display:flex;align-items:center;justify-content:center;gap:10px;margin:8px 0 6px}
  .diamond-line span{width:80px;height:1.5px;background:var(--gold)}
  .diamond-line i{width:11px;height:11px;background:var(--gold);transform:rotate(45deg)}
  .certify{letter-spacing:3px;font:600 13px 'Cinzel',serif}

  .student{width:460px;margin-top:20px}
  #studentName{
    margin:0;padding:0 0 4px;border-bottom:1.5px solid var(--navy);
    font:700 32px/1.2 'Playfair Display',serif;color:var(--navy);
  }
  .caption{font:italic 12px 'Playfair Display',serif;margin-top:3px}

  .completed{font:500 16px 'Playfair Display',serif;margin-top:10px}

  .course-banner{
    margin-top:8px;min-width:400px;max-width:620px;padding:9px 40px;
    background:var(--gold-grad-h);border:1px solid #a97813;
    font:700 19px 'Playfair Display',serif;color:var(--navy);
    clip-path:polygon(0 0,calc(100% - 16px) 0,100% 50%,calc(100% - 16px) 100%,0 100%,16px 50%);
  }

  .desc{font:500 14px/1.5 'Playfair Display',serif;max-width:560px;margin:12px 0 12px}

  /* ---------- Details box ---------- */
  .details{
    width:640px;border:2px solid var(--gold);border-radius:14px;background:#fffdf6;
    padding:12px 18px;display:flex;font-size:12.5px;font-weight:600;text-align:left;
  }
  .details .left{flex:1.55;padding-right:14px}
  .details .right{flex:1;padding-left:18px;border-left:1px solid #d9c58a}
  .row-d{display:flex;align-items:flex-end;margin-bottom:9px;min-height:22px}
  .row-d:last-child{margin-bottom:0}
  .row-d .lbl{width:104px;flex:none}
  .row-d .col{width:14px;flex:none;text-align:center}
  .right .row-d .lbl{width:74px}
  .val{flex:1;border-bottom:1px solid var(--navy);text-align:center;font-weight:600;font-size:12px;padding:0 2px;min-height:20px}
  .val small{display:block;position:absolute}
  .period{display:flex;align-items:flex-end;flex:1;gap:6px}
  .period .cell{flex:1;position:relative}
  .period .cell small{position:absolute;left:0;right:0;top:100%;margin-top:1px;font:italic 8.5px 'Playfair Display',serif;text-align:center}
  .period .to{font-weight:600;padding-bottom:1px}
  .row-d.period-row{margin-bottom:16px}

  /* ---------- Skill icons ---------- */
  .skills{display:flex;width:640px;margin-top:14px}
  .skill{flex:1;text-align:center;font-size:10px;font-weight:600;line-height:1.15}
  .skill + .skill{border-left:1px solid #d9c58a}
  .skill .ico{
    width:40px;height:40px;border-radius:50%;border:2px solid var(--gold);background:#fffaf0;
    display:flex;align-items:center;justify-content:center;margin:0 auto 4px;font-size:17px;
    box-shadow:0 0 0 2px #fff,0 0 0 3px rgba(201,150,31,.5);
  }

  /* ---------- Footer ---------- */
  .footer{width:100%;margin-top:auto;display:flex;justify-content:space-between;align-items:flex-end;padding:0 4px 0 6px}
  .loc{font-size:13px;font-weight:600;display:flex;align-items:center;gap:8px}
  .sign{
    border:2px solid var(--gold);border-radius:10px;background:#fffdf6;
    padding:6px 30px;text-align:center;line-height:1.3;
  }
  .sign .nm{font:700 17px 'Playfair Display',serif}
  .sign .ds{font-size:11px;font-weight:500}

  /* ---------- Print ---------- */
  @page{size:297mm 210mm;margin:0}
  @media print{
    html,body{background:#fff!important;-webkit-print-color-adjust:exact;print-color-adjust:exact}
    .no-print{display:none!important}
    .cert-wrap{padding:0;display:block}
    .certificate{margin:0;box-shadow:none;zoom:1!important}
  }
</style>

<div class="text-center mt-3 mb-2 no-print" style="text-align:center">
  <button class="btn btn-dark" style="padding:8px 18px;border-radius:6px;border:0;background:#fff;color:#0c1f44;font-weight:600" onclick="window.print()">Print / Save as PDF</button>
</div>

<div class="cert-wrap">
<div class="certificate" id="cert">

  <!-- ================= BACKGROUND ARTWORK ================= -->
  <svg class="bg" viewBox="0 0 1123 794" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
    <defs>
      <linearGradient id="g" x1="0" y1="0" x2="0" y2="1">
        <stop offset="0" stop-color="#b8861a"/><stop offset=".45" stop-color="#f6df8c"/><stop offset="1" stop-color="#b8861a"/>
      </linearGradient>
      <linearGradient id="gh" x1="0" y1="0" x2="1" y2="0">
        <stop offset="0" stop-color="#b8861a"/><stop offset=".3" stop-color="#f6df8c"/><stop offset=".6" stop-color="#e3b83e"/><stop offset="1" stop-color="#b8861a"/>
      </linearGradient>
    </defs>

    <!-- faint watermark -->
    <text x="790" y="560" font-family="Cinzel,serif" font-weight="900" font-size="380" fill="#c9961f" opacity=".045" text-anchor="middle">S</text>

    <!-- left navy band + gold lines -->
    <path d="M0 0H64C42 150 96 260 62 400C30 540 86 660 56 794H0Z" fill="#0c1f44"/>
    <path d="M64 0C42 150 96 260 62 400C30 540 86 660 56 794" fill="none" stroke="url(#g)" stroke-width="5"/>
    <path d="M84 0C62 150 116 260 82 400C50 540 106 660 76 794" fill="none" stroke="url(#g)" stroke-width="2"/>

    <!-- top swoosh -->
    <path d="M300 0C420 58 640 44 770 0" fill="none" stroke="url(#gh)" stroke-width="3"/>
    <path d="M300 0C430 70 650 56 790 0" fill="none" stroke="url(#gh)" stroke-width="1.2"/>

    <!-- bottom-right navy + gold swooshes -->
    <path d="M1123 794V330C1072 450 1092 610 952 794Z" fill="#0c1f44"/>
    <path d="M1123 340C1066 462 1086 620 944 794" fill="none" stroke="url(#g)" stroke-width="6"/>
    <path d="M1123 380C1082 480 1100 630 984 794" fill="none" stroke="url(#g)" stroke-width="2"/>
    <path d="M1123 300C1050 430 1070 600 905 794" fill="none" stroke="url(#g)" stroke-width="2"/>

    <!-- ribbon tails -->
    <path d="M108 470L68 600L114 574L140 628L164 498Z" fill="#0c1f44" stroke="url(#g)" stroke-width="4" stroke-linejoin="round"/>
    <path d="M236 470L276 600L230 574L204 628L180 498Z" fill="#0c1f44" stroke="url(#g)" stroke-width="4" stroke-linejoin="round"/>

    <!-- logo shield -->
    <path d="M42 0H302V212Q302 248 270 262L172 312L74 262Q42 248 42 212Z" fill="#0c1f44" stroke="url(#g)" stroke-width="6"/>
    <path d="M54 0H290V208Q290 240 262 252L172 297L82 252Q54 240 54 208Z" fill="none" stroke="#f3d77a" stroke-width="1" opacity=".6"/>
    <!-- cap -->
    <polygon points="172,26 232,50 172,74 112,50" fill="url(#g)"/>
    <path d="M140 62V84Q172 102 204 84V62L172 76Z" fill="url(#g)"/>
    <path d="M226 52V84" stroke="url(#g)" stroke-width="2.5"/>
    <circle cx="226" cy="88" r="3.5" fill="url(#g)"/>
    <text x="172" y="160" text-anchor="middle" font-family="Cinzel,serif" font-weight="900" font-size="96" fill="url(#g)">S</text>
    <text x="172" y="204" text-anchor="middle" font-family="Cinzel,serif" font-weight="900" font-size="27" fill="#ffffff" letter-spacing="1">SKILLS ERA</text>
    <text x="172" y="228" text-anchor="middle" font-family="Poppins,sans-serif" font-size="10.5" fill="#f3d77a">Learn Practical. Become Job Ready.</text>

    <!-- badge -->
    <circle cx="172" cy="398" r="114" fill="url(#g)"/>
    <circle cx="172" cy="398" r="114" fill="none" stroke="#fff3c4" stroke-width="5" stroke-dasharray="3 7" opacity=".8"/>
    <circle cx="172" cy="398" r="94" fill="#0c1f44" stroke="#f3d77a" stroke-width="3"/>
    <circle cx="172" cy="398" r="84" fill="none" stroke="url(#g)" stroke-width="2" stroke-dasharray="1 5" stroke-linecap="round"/>
    <text x="172" y="346" text-anchor="middle" font-size="26" fill="#f3d77a">♛</text>
    <g font-family="Poppins,sans-serif" font-size="13.5" font-weight="600" fill="#ffffff" text-anchor="middle" letter-spacing=".6">
      <text x="172" y="378">PRACTICAL</text>
      <text x="172" y="397">LEARNING</text>
      <text x="172" y="416">REAL CAREER</text>
      <text x="172" y="435">GROWTH</text>
    </g>
    <text x="172" y="462" text-anchor="middle" font-size="17" fill="#f3d77a" letter-spacing="3">★★★★★</text>

    <!-- outer borders -->
    <rect x="9" y="9" width="1105" height="776" fill="none" stroke="url(#g)" stroke-width="3"/>
    <rect x="18" y="18" width="1087" height="758" fill="none" stroke="#c9961f" stroke-width="1" opacity=".7"/>
  </svg>

  <!-- top-right points -->
  <div class="top-points">
    <div><i></i>PRACTICAL SKILLS</div>
    <div><i></i>PROFESSIONAL GROWTH</div>
    <div><i></i>CAREER READINESS</div>
  </div>

  <!-- ================= CONTENT ================= -->
  <div class="content">

    <div class="brand"><span class="s">SKILLS</span> <span class="gold-text">ERA</span></div>
    <div class="tagline">Learn Practical. Become <b>Job Ready.</b></div>

    <div class="cert-title">Certificate of Completion</div>
    <div class="diamond-line"><span></span><i></i><span></span></div>
    <div class="certify">THIS IS TO CERTIFY THAT</div>

    <div class="student">
      <h3 id="studentName">{{ ucwords(strtolower($certificate->student->name ?? 'Student Name')) }}</h3>
      <div class="caption">(Student Name)</div>
    </div>

    <div class="completed">{{ ucwords($certificate->title) }}</div>

    <div class="course-banner" contenteditable="true" id="courseName">{{ $certificate->course->name ?? '-' }}</div>

    @if($certificate->description)
    <p class="desc">
      at <b>Skills Era</b>,{{ $certificate->description }}

    </p>
     @endif


    <!-- Details -->
    <div class="details">
      <div class="left">
        <div class="row-d period-row">
          <div class="lbl">Training Period</div><div class="col">:</div>
          <div class="period">
            <div class="cell val">{{ $certificate->student->created_at?->format('d M Y') ?? 'Training Date' }}<small>(Start Date)</small></div>
            <div class="to">to</div>
            <div class="cell val">{{ $certificate->completion_date?->format('d M Y') }}<small>(End Date)</small></div>
          </div>
        </div>
        <div class="row-d">
          <div class="lbl">Mode</div><div class="col">:</div>
          <div class="val" style="text-align:left;border-bottom-color:transparent;flex:none;min-width:120px;border-bottom:1px solid var(--navy)">{{ $certificate->course->mode ?? '-' }}</div>
        </div>
        <div class="row-d">
          <div class="lbl">Certificate ID</div><div class="col">:</div>
          <div class="val">{{ $certificate->certificate_number }}</div>
        </div>
      </div>

      <div class="right">
        <div class="row-d" style="margin-bottom:22px">
          <div class="lbl">Grade</div><div class="col">:</div>
          <div class="val">{{ $certificate->grade ?? '-' }}</div>
        </div>
        <div class="row-d">
          <div class="lbl">Issued on</div><div class="col">:</div>
          <div class="val">{{ $certificate->issue_date?->format('d M Y') }}</div>
        </div>
      </div>
    </div>

    <!-- Skill icons -->
    <div class="skills">
      <div class="skill"><div class="ico">👥</div>HR<br>Operations</div>
      <div class="skill"><div class="ico">🧮</div>Payroll<br>Process</div>
      <div class="skill"><div class="ico">📅</div>Attendance<br>Management</div>
      <div class="skill"><div class="ico">🛡️</div>Statutory<br>Compliance</div>
      <div class="skill"><div class="ico">📊</div>Excel &amp;<br>MIS Reporting</div>
      <div class="skill"><div class="ico">🖥️</div>HRMS<br>Software</div>
    </div>

    <!-- Footer -->
    <div class="footer">
      <div class="loc">
        <svg width="20" height="26" viewBox="0 0 20 26"><path d="M10 0C4.5 0 0 4.4 0 9.8 0 17 10 26 10 26s10-9 10-16.2C20 4.4 15.5 0 10 0z" fill="#0c1f44"/><circle cx="10" cy="9.5" r="3.6" fill="#fff"/></svg>
        Ghaziabad, Uttar Pradesh
      </div>
      <div class="sign">
        <div class="nm">Aadarsh Tomar</div>
        <div class="ds">Founder &amp; Trainer<br>Skills Era</div>
      </div>
    </div>

  </div>
</div>
</div>

<script>
  (function(){
    var cert = document.getElementById('cert');
    var wrap = cert.parentNode;
    function fit(){
      cert.style.zoom = 1;
      var w = wrap.clientWidth - 16;
      cert.style.zoom = Math.min(1, w / 1123);
    }
    fit();
    window.addEventListener('load', fit);
    window.addEventListener('resize', fit);
    if (window.ResizeObserver) { new ResizeObserver(fit).observe(wrap.parentNode); }
    window.addEventListener('beforeprint', function(){ cert.style.zoom = 1; });
    window.addEventListener('afterprint', fit);
  })();
</script>
@endsection
