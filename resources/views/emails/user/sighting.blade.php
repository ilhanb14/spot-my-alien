<body style="background-color:#0b0c2a">
<table role="presentation" width="100%" style="background-color:#0b0c2a; padding:20px 0;">
  <tr>
    <td align="center" style="color:#00ff9f; font-family: 'Orbitron', 'Segoe UI', sans-serif; font-size:28px;">
      🛸 UFO Melding Geregistreerd
    </td>
  </tr>
</table>

<table role="presentation" width="100%" style="background-color:#0b0c2a; color:#ffffff; font-family: 'Orbitron', 'Segoe UI', sans-serif; padding:30px; border-radius:8px;">
  <tr>
    <td style="font-size:18px; line-height:1.6;">
      Hallo {{ $userName ?? 'gebruiker' }},
      <br><br>
      We hebben je UFO melding meegekregen op <strong>{{ \Carbon\Carbon::parse($createdAt)->format('d/m/y') ?? 'datum onbekend' }}</strong>.
      <br><br>
      Ons team onderzoekt de details die je ons hebt meegegeven:
    </td>
  </tr>
  <tr>
    <td style="padding-top:15px;">
      <ul style="list-style-type: none; padding: 0; margin: 0;">
        <li><strong>Dag:</strong> {{ \Carbon\Carbon::parse($sightingDateTime)->format('d/m/y') ?? 'n.v.t.' }}</li>
        <li><strong>Tijdstip:</strong> {{ \Carbon\Carbon::parse($sightingDateTime)->format('H:i') ?? 'n.v.t.' }}</li>
        <li><strong>Type Waarneming:</strong> {{ $sightingType ?? 'n.v.t.' }}</li>
        <li><strong>Locatie:</strong> {{ $sightingLocation ?? 'n.v.t.' }}</li>
        <li><strong>Beschrijving:</strong> {{ $sightingDescription ?? 'Geen beschrijving.' }}</li>
      </ul>
    </td>
  </tr>
  <tr>
    <td style="padding-top:20px;">
      Je helpt ons de planeet veilig te houden! 👽<br>
      Je bent altijd welkom om meer waarnemingen aan te geven of andere te bekijken op onze website.
    </td>
  </tr>
</table>

<table role="presentation" width="100%" style="background-color:#0b0c2a; padding:20px 0;">
  <tr>
    <td align="center" style="color:#00ff9f; font-size:14px; font-family: 'Orbitron', 'Segoe UI', sans-serif;">
      Bericht van Spot My Alien<br>
      <a href="{{ config('app.url') }}" style="color:#00ff9f; text-decoration:none;">Bezoek onze website</a>
    </td>
  </tr>
</table>
</body>