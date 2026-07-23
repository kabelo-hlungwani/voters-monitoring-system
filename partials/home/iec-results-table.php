<?php
$iecView = isset($_GET['iec_view']) ? strtolower(trim($_GET['iec_view'])) : 'npe';
$allowedViews = array('npe', 'mbe', 'me');

if (!in_array($iecView, $allowedViews, true)) {
    $iecView = 'npe';
}

$iecPageSize = 5;
$iecCurrentPage = isset($_GET['iec_page']) ? max(1, (int) $_GET['iec_page']) : 1;

$iecViews = array(
    'npe' => array(
        'label' => 'National Assembly',
        'title' => 'National Assembly 2024 Leading Parties',
        'eyebrow' => 'IEC South Africa Snapshot',
        'description' => 'Publicly visible IEC dashboard data summarised into a paginated table for quicker scanning on the VMS website.',
        'rows' => array(
            array('party' => 'ANC', 'name' => 'African National Congress', 'votes' => '12 698 759', 'support' => '40.18%', 'seats' => '159', 'comparison' => '1999 2004 2009 2014 2019'),
            array('party' => 'DA', 'name' => 'Democratic Alliance', 'votes' => '6 961 361', 'support' => '21.81%', 'seats' => '87', 'comparison' => '1999 2004 2009 2014 2019'),
            array('party' => 'M.K.', 'name' => 'Umkhonto Wesizwe', 'votes' => '4 584 864', 'support' => '14.58%', 'seats' => '58', 'comparison' => '1999 2004 2009 2014 2019'),
            array('party' => 'EFF', 'name' => 'Economic Freedom Fighters', 'votes' => '3 090 020', 'support' => '9.52%', 'seats' => '39', 'comparison' => '1999 2004 2009 2014 2019'),
            array('party' => 'IFP', 'name' => 'Inkatha Freedom Party', 'votes' => '1 307 088', 'support' => '3.85%', 'seats' => '17', 'comparison' => '1999 2004 2009 2014 2019'),
            array('party' => 'PA', 'name' => 'Patriotic Alliance', 'votes' => '677 719', 'support' => '2.06%', 'seats' => '9', 'comparison' => '1999 2004 2009 2014 2019'),
            array('party' => 'VF PLUS', 'name' => 'Vryheidsfront Plus', 'votes' => '455 657', 'support' => '1.36%', 'seats' => '6', 'comparison' => '1999 2004 2009 2014 2019'),
            array('party' => 'ACTIONSA', 'name' => 'ActionSA', 'votes' => '413 239', 'support' => '1.20%', 'seats' => '6', 'comparison' => '1999 2004 2009 2014 2019'),
            array('party' => 'ACDP', 'name' => 'African Christian Democratic Party', 'votes' => '190 460', 'support' => '0.60%', 'seats' => '3', 'comparison' => '1999 2004 2009 2014 2019'),
            array('party' => 'UDM', 'name' => 'United Democratic Movement', 'votes' => '164 210', 'support' => '0.49%', 'seats' => '3', 'comparison' => '1999 2004 2009 2014 2019'),
            array('party' => 'BOSA', 'name' => 'Build One South Africa', 'votes' => '135 413', 'support' => '0.41%', 'seats' => '2', 'comparison' => '1999 2004 2009 2014 2019'),
            array('party' => 'RISE', 'name' => 'Rise Mzansi', 'votes' => '138 528', 'support' => '0.42%', 'seats' => '2', 'comparison' => '1999 2004 2009 2014 2019'),
            array('party' => 'ATM', 'name' => 'African Transformation Movement', 'votes' => '130 466', 'support' => '0.40%', 'seats' => '2', 'comparison' => '1999 2004 2009 2014 2019'),
            array('party' => 'CCC', 'name' => 'National Coloured Congress', 'votes' => '84 611', 'support' => '0.23%', 'seats' => '2', 'comparison' => '1999 2004 2009 2014 2019'),
            array('party' => 'AL JAMA', 'name' => 'Al Jama-Ah', 'votes' => '92 472', 'support' => '0.24%', 'seats' => '2', 'comparison' => '1999 2004 2009 2014 2019'),
            array('party' => 'PAC', 'name' => 'Pan Africanist Congress of Azania', 'votes' => '77 544', 'support' => '0.23%', 'seats' => '1', 'comparison' => '1999 2004 2009 2014 2019'),
            array('party' => 'GOOD', 'name' => 'GOOD', 'votes' => '65 814', 'support' => '0.18%', 'seats' => '1', 'comparison' => '1999 2004 2009 2014 2019'),
            array('party' => 'UAT', 'name' => 'United Africans Transformation', 'votes' => '67 948', 'support' => '0.22%', 'seats' => '1', 'comparison' => '1999 2004 2009 2014 2019'),
            array('party' => 'NFP', 'name' => 'National Freedom Party', 'votes' => '42 143', 'support' => '0.12%', 'seats' => '0', 'comparison' => '1999 2004 2009 2014 2019'),
            array('party' => '#HOPE4SA', 'name' => '#HOPE4SA', 'votes' => '44 184', 'support' => '0.17%', 'seats' => '0', 'comparison' => '1999 2004 2009 2014 2019')
        ),
        'columns' => array('Party', 'Party Name', 'Votes', 'Support', 'Seats', 'Comparison Years'),
        'sourceLabel' => 'IEC public results portal',
        'coverageLabel' => 'National Assembly 2024',
        'sourceLink' => 'https://results.elections.org.za/dashboards/npe',
        'reportsLink' => 'https://results.elections.org.za/home/Downloads/NPE-Results',
        'emptyText' => 'No National Assembly rows available.'
    ),
    'mbe' => array(
        'label' => 'By-Elections',
        'title' => 'Municipal By-Election Snapshot',
        'eyebrow' => 'IEC By-Election Dashboard',
        'description' => 'Top parties and turnout metrics for the latest by-election dashboard view shown in a paginated table.',
        'rows' => array(
            array('party' => 'ANC', 'name' => 'Leading Party', 'votes' => '2 407', 'support' => '60.91%', 'seats' => '1', 'comparison' => '24 Jun 2026'),
            array('party' => 'DA', 'name' => 'Runner-Up Party', 'votes' => '898', 'support' => '22.72%', 'seats' => '1', 'comparison' => '24 Jun 2026'),
            array('party' => 'EFF', 'name' => 'Third Place Party', 'votes' => '436', 'support' => '11.03%', 'seats' => '0', 'comparison' => '24 Jun 2026'),
            array('party' => 'TOTAL', 'name' => 'Registered Population', 'votes' => '13 902', 'support' => '100%', 'seats' => '4 000', 'comparison' => '24 Jun 2026'),
            array('party' => 'TURNOUT', 'name' => 'Total Votes Cast', 'votes' => '4 000', 'support' => '58.64%', 'seats' => '3 952', 'comparison' => '24 Jun 2026'),
            array('party' => 'VALID', 'name' => 'Valid Votes', 'votes' => '3 952', 'support' => '98.8%', 'seats' => '48', 'comparison' => '24 Jun 2026'),
            array('party' => 'SPOILT', 'name' => 'Spoilt Votes', 'votes' => '48', 'support' => '1.2%', 'seats' => '0', 'comparison' => '24 Jun 2026')
        ),
        'columns' => array('Party', 'Status', 'Votes', 'Support', 'Metric', 'Date'),
        'sourceLabel' => 'IEC by-election dashboard',
        'coverageLabel' => 'Municipal By-Election 2026 snapshot',
        'sourceLink' => 'https://results.elections.org.za/dashboards/byelection',
        'reportsLink' => 'https://results.elections.org.za/home/Downloads/MBE-Results',
        'emptyText' => 'No by-election rows available.'
    ),
    'me' => array(
        'label' => 'Municipal Elections',
        'title' => 'Municipal Election Report Types',
        'eyebrow' => 'IEC Downloadable Reports',
        'description' => 'Official municipal election report families available from the IEC download page. This view helps you reach the report that matches your analysis needs.',
        'rows' => array(
            array('report' => 'Results Summary', 'level' => 'Municipal / Ward / Voting District', 'formats' => 'PDF, Excel', 'notes' => 'Votes cast across ballot types.', 'source' => 'Download'),
            array('report' => 'Party Results', 'level' => 'Selected Party', 'formats' => 'PDF, Excel', 'notes' => 'Votes cast and overall support for a selected party.', 'source' => 'Download'),
            array('report' => 'Seat Calculation Detail', 'level' => 'Municipal', 'formats' => 'PDF, Excel', 'notes' => 'Seat calculation methods and allocation details.', 'source' => 'Download'),
            array('report' => 'Percentage Voter Turnout', 'level' => 'Ward / PR Votes', 'formats' => 'PDF, Excel', 'notes' => 'Turnout compared to registered population.', 'source' => 'Download'),
            array('report' => 'Spoilt Votes', 'level' => 'Ballot Type', 'formats' => 'PDF, Excel', 'notes' => 'Spoilt ballots by ballot type.', 'source' => 'Download'),
            array('report' => 'Detailed Results', 'level' => 'Municipal / Voting District', 'formats' => 'PDF, Excel', 'notes' => 'Detailed votes including spoilt ballots.', 'source' => 'Download')
        ),
        'columns' => array('Report', 'Level', 'Formats', 'Notes', 'Action'),
        'sourceLabel' => 'IEC municipal reports',
        'coverageLabel' => 'Municipal Elections report families',
        'sourceLink' => 'https://results.elections.org.za/home/Downloads/ME-Results',
        'reportsLink' => 'https://results.elections.org.za/home/Downloads/ME-Results',
        'emptyText' => 'No municipal report rows available.'
    )
);

$activeView = $iecViews[$iecView];
$iecRows = $activeView['rows'];
$iecTotalPages = max(1, (int) ceil(count($iecRows) / $iecPageSize));
$iecCurrentPage = min($iecCurrentPage, $iecTotalPages);
$iecOffset = ($iecCurrentPage - 1) * $iecPageSize;
$iecVisibleRows = array_slice($iecRows, $iecOffset, $iecPageSize);
$iecStartRow = count($iecRows) > 0 ? $iecOffset + 1 : 0;
$iecEndRow = min($iecOffset + $iecPageSize, count($iecRows));

function iecViewLink(array $params)
{
    $query = http_build_query($params);

    return 'results.php' . ($query !== '' ? '?' . $query : '');
}
?>

<section class="mx-auto max-w-7xl px-4 pb-16">
    <div class="vms-shadow rounded-3xl border border-blue-100 bg-white/90 p-6 sm:p-8">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#1a56d6]"><?php echo htmlspecialchars($activeView['eyebrow']); ?></p>
                <h2 class="vms-title mt-2 text-2xl font-bold text-[#0b2a66] sm:text-3xl"><?php echo htmlspecialchars($activeView['title']); ?></h2>
                <p class="mt-3 max-w-3xl text-sm text-slate-600 sm:text-base">
                    <?php echo htmlspecialchars($activeView['description']); ?>
                </p>
            </div>
            <div class="flex flex-wrap gap-3">
                <a href="<?php echo htmlspecialchars($activeView['sourceLink']); ?>" target="_blank" class="rounded-xl bg-[#1a56d6] px-4 py-2 text-sm font-semibold text-white transition hover:bg-[#123f9f]">Open IEC Dashboard</a>
                <a href="<?php echo htmlspecialchars($activeView['reportsLink']); ?>" target="_blank" class="rounded-xl border border-blue-200 px-4 py-2 text-sm font-semibold text-[#123f9f] transition hover:border-blue-400 hover:text-[#1a56d6]">Official Reports</a>
            </div>
        </div>

        <div class="mt-6 flex flex-wrap gap-2">
            <?php foreach ($iecViews as $viewKey => $viewData) { ?>
                <a
                    href="<?php echo htmlspecialchars(iecViewLink(array('iec_view' => $viewKey))); ?>"
                    class="rounded-full border px-4 py-2 text-sm font-semibold transition <?php echo $viewKey === $iecView ? 'border-[#1a56d6] bg-[#1a56d6] text-white' : 'border-blue-200 bg-blue-50/60 text-[#123f9f] hover:border-blue-400 hover:text-[#1a56d6]'; ?>"
                >
                    <?php echo htmlspecialchars($viewData['label']); ?>
                </a>
            <?php } ?>
        </div>

        <div class="mt-6 grid gap-4 sm:grid-cols-3">
            <article class="rounded-2xl bg-blue-50 p-4">
                <p class="text-xs font-semibold uppercase tracking-[0.16em] text-[#1a56d6]">Source</p>
                <p class="mt-2 text-sm text-slate-600"><?php echo htmlspecialchars($activeView['sourceLabel']); ?></p>
            </article>
            <article class="rounded-2xl bg-blue-50 p-4">
                <p class="text-xs font-semibold uppercase tracking-[0.16em] text-[#1a56d6]">Coverage</p>
                <p class="mt-2 text-sm text-slate-600"><?php echo htmlspecialchars($activeView['coverageLabel']); ?></p>
            </article>
            <article class="rounded-2xl bg-blue-50 p-4">
                <p class="text-xs font-semibold uppercase tracking-[0.16em] text-[#1a56d6]">Showing</p>
                <p class="mt-2 text-sm text-slate-600"><?php echo (int) $iecStartRow; ?>-<?php echo (int) $iecEndRow; ?> of <?php echo (int) count($iecRows); ?></p>
            </article>
        </div>

        <div class="mt-6 overflow-hidden rounded-2xl border border-blue-100">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-blue-100 text-left text-sm">
                    <thead class="bg-[#0b2a66] text-white">
                        <tr>
                            <?php foreach ($activeView['columns'] as $columnLabel) { ?>
                                <th class="px-4 py-3 font-semibold"><?php echo htmlspecialchars($columnLabel); ?></th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-blue-50 bg-white">
                        <?php if (!empty($iecVisibleRows)) { ?>
                            <?php foreach ($iecVisibleRows as $row) { ?>
                                <tr class="hover:bg-blue-50/60">
                                    <?php if ($iecView === 'me') { ?>
                                        <td class="px-4 py-3 font-semibold text-[#0b2a66]"><?php echo htmlspecialchars($row['report']); ?></td>
                                        <td class="px-4 py-3 text-slate-700"><?php echo htmlspecialchars($row['level']); ?></td>
                                        <td class="px-4 py-3 text-slate-700"><?php echo htmlspecialchars($row['formats']); ?></td>
                                        <td class="px-4 py-3 text-slate-700"><?php echo htmlspecialchars($row['notes']); ?></td>
                                        <td class="px-4 py-3 text-slate-700">
                                            <a href="<?php echo htmlspecialchars($activeView['reportsLink']); ?>" target="_blank" class="font-semibold text-[#1a56d6] transition hover:text-[#123f9f]">
                                                <?php echo htmlspecialchars($row['source']); ?>
                                            </a>
                                        </td>
                                    <?php } else { ?>
                                        <td class="px-4 py-3 font-semibold text-[#0b2a66]"><?php echo htmlspecialchars($row['party']); ?></td>
                                        <td class="px-4 py-3 text-slate-700"><?php echo htmlspecialchars($row['name']); ?></td>
                                        <td class="px-4 py-3 text-slate-700"><?php echo htmlspecialchars($row['votes']); ?></td>
                                        <td class="px-4 py-3 text-slate-700"><?php echo htmlspecialchars($row['support']); ?></td>
                                        <td class="px-4 py-3 text-slate-700"><?php echo htmlspecialchars($row['seats']); ?></td>
                                        <td class="px-4 py-3 text-slate-500"><?php echo htmlspecialchars($row['comparison']); ?></td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td class="px-4 py-4 text-sm text-slate-500" colspan="<?php echo count($activeView['columns']); ?>"><?php echo htmlspecialchars($activeView['emptyText']); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-6 flex flex-col items-center justify-between gap-4 sm:flex-row">
            <p class="text-sm text-slate-500">
                <?php if ($iecView === 'npe') { ?>
                    Sourced from the IEC public dashboard summary and presented here with pagination for easier browsing.
                <?php } elseif ($iecView === 'mbe') { ?>
                    This by-election snapshot uses the IEC public dashboard summary and also links to the official by-election reports.
                <?php } else { ?>
                    The municipal election view lists official report families from the IEC download page, with direct access to downloadable formats.
                <?php } ?>
            </p>

            <?php if ($iecTotalPages > 1) { ?>
                <nav aria-label="IEC table pagination" class="flex items-center gap-2">
                    <a
                        href="<?php echo $iecCurrentPage > 1 ? htmlspecialchars(iecViewLink(array('iec_view' => $iecView, 'iec_page' => $iecCurrentPage - 1))) : '#'; ?>"
                        class="rounded-lg border px-3 py-2 text-sm font-semibold transition <?php echo $iecCurrentPage > 1 ? 'border-blue-200 text-[#123f9f] hover:border-blue-400 hover:text-[#1a56d6]' : 'pointer-events-none border-slate-200 text-slate-300'; ?>"
                    >
                        Prev
                    </a>

                    <?php for ($pageNumber = 1; $pageNumber <= $iecTotalPages; $pageNumber++) { ?>
                        <a
                            href="<?php echo htmlspecialchars(iecViewLink(array('iec_view' => $iecView, 'iec_page' => $pageNumber))); ?>"
                            class="rounded-lg px-3 py-2 text-sm font-semibold transition <?php echo $pageNumber === $iecCurrentPage ? 'bg-[#1a56d6] text-white' : 'border border-blue-200 text-[#123f9f] hover:border-blue-400 hover:text-[#1a56d6]'; ?>"
                        >
                            <?php echo $pageNumber; ?>
                        </a>
                    <?php } ?>

                    <a
                        href="<?php echo $iecCurrentPage < $iecTotalPages ? htmlspecialchars(iecViewLink(array('iec_view' => $iecView, 'iec_page' => $iecCurrentPage + 1))) : '#'; ?>"
                        class="rounded-lg border px-3 py-2 text-sm font-semibold transition <?php echo $iecCurrentPage < $iecTotalPages ? 'border-blue-200 text-[#123f9f] hover:border-blue-400 hover:text-[#1a56d6]' : 'pointer-events-none border-slate-200 text-slate-300'; ?>"
                    >
                        Next
                    </a>
                </nav>
            <?php } ?>
        </div>
    </div>
</section>
