<!-- Display a list of buses -->
<h1>List of Buses</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Bus Number</th>
            <th>License Plate</th>
            <th>Company ID</th>
            <th>Capacity</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($buses as $bus) : ?>
        <tr>
            <td><?php echo $bus->getBusID(); ?></td>
            <td><?php echo $bus->getBusNumber(); ?></td>
            <td><?php echo $bus->getLicensePlate(); ?></td>
            <td><?php echo $bus->getCompanyID(); ?></td>
            <td><?php echo $bus->getCapacity(); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>