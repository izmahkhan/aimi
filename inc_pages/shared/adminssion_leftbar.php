<style>
.sidebar-categories li {
    padding-left: 20px !important;
    margin-left: 0px !important;
}

.sidebar-categories li {
    margin-bottom: 10px;
    padding-bottom: 10px;
    border-bottom: 1px solid #e0e0e0;
}

.act {
    color: #E7B03C !important;
}
</style>
<ul class="sidebar-categories">
    <li><a <?= ($_REQUEST['page'] == 'admission-process') ? 'class="act"' : ''; ?>
            href="<?= $path; ?>admission-process">Admission Process</a></li>
    <!-- <li><a <?= ($_REQUEST['page'] == 'interview-structure') ? 'class="act"' : ''; ?> href="<?= $path; ?>interview-structure">Interview Structure</a></li> -->
    <li><a <?= ($_REQUEST['page'] == 'fee-structure') ? 'class="act"' : ''; ?> href="<?= $path; ?>fee-structure"
            target="_blank">Fee Structure (Session 2021-22)</a></li>
    <?php if ($sandbox) { ?>
    <li><a <?= ($_REQUEST['page'] == 'merit-list' || $_REQUEST['page'] == 'merit-list-detail') ? 'class="act"' : ''; ?>
            href="<?= $path; ?>merit-list">Merit List MBBS & BDS Session 2020-21</a></li>
    <?php } ?>
    <!-- <li><a <?= ($_REQUEST['page'] == 'waiting-list-mbbs') ? 'class="act"' : ''; ?> href="<?= $path; ?>waiting-list">Waiting List MBBS & BDS Issued by PMC</a></li> -->
    <!-- <li><a <?= ($_REQUEST['page'] == 'merit-list-bds') ? 'class="act"' : ''; ?> href="<?= $path; ?>merit-list-bds">Merit List BDS</a></li> -->
</ul>