<?php

final class ExecPassthruTestCase extends PhutilTestCase {

  public function testExecPassthru() {
    // NOTE: We're limited in what we can do here easily; this process can't
    // read any output from the child process (and it will be sent directly to
    // the terminal, which is undesirable). This makes crafting effective unit
    // tests a fairly involved process.

    $root = dirname(phutil_get_library_root('arcanist'));
    $bin = $root.'/support/unit/exit.php';

    $exec = new PhutilExecPassthru('php -f %R', $bin);
    $err = $exec->execute();
    $this->assertEqual(0, $err);
  }

}
