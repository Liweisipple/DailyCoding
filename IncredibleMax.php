<?php
interface Heterodynamics 
{
    /**
     * @author Gargaro <managerlws@163.com>
     */
    public function activate(array $target);
}

/**
 * 风暴类
 */
class Storm implements Heterodynamics
{
    protected $damgeRange;//破坏范围

    protected $damgeTime;//破坏持续时间

    public function __construct($damgeRange = 0, $damgeTime = 0)
    {
        $this->damgeRange = $damgeRange;
        $this->damgeTime = $damgeTime;
    }

    /**
     * 激活风暴能力!
     *
     * @param array $target
     * @return void
     */
    public function activate(array $target = [])
    {
        echo "使用能力,风暴!";
    }

    public function __toString()
    {
        return '破坏范围是' . $this->damgeRange . '破坏持续时间是' . $this->damgeTime;
    }
}

/**
 * 钢铁盔甲类
 */
class IronArmor implements Heterodynamics
{
    protected $incressHp;//增加hp

    protected $incressMp;//增加mp

    public function __construct($incressHp = 0, $incressMp = 0)
    {
        $this->incressHp = $incressHp;
        $this->incressMp = $incressMp;
    }

    public function activate(array $target = [])
    {
        echo "使用能力,钢铁盔甲!";
    }

    public function __toString()
    {
        return '增加hp' . $this->incressHp . '增加mp' . $this->incressMp;
    }
}

/**
 * 异能力工厂
 */
class HeterodynamicsFactory
{
    public function makeHeterodynamics($HeterodynamicsName, $options)
    {
        switch($HeterodynamicsName) {
            case 'Storm':
            return new Storm($options[0], $options[1]);
            case 'IronArmor':
            return new IronArmor($options[0], $options[1]);
        }
    }
}

/**
 * 超能力先生
 */
class IncredibleMan
{
    public $skills = [];//超能力先生的能力合集

    public function __construct(array $abilitys)
    {
        $ab = new HeterodynamicsFactory();//实例化异能力工厂类 准备给超能力先生赋予能力！
        foreach ($abilitys as $abilityName => $abilityOptions) {
            $this->skills[] = $ab->makeHeterodynamics(abilityName, abilityOptions);//赋予能力！
        }
    }

    /**
     * 查看超能力先生的异能力
     *
     * @return string
     */
    public function __toString()
    {
        if(count($this->skills) < 1){
            return '超能力先生还没任何异能力';
        }
        foreach ($this->skills as $key => $value) {
            echo $key . '=>' . $value . '<br/>';    
        }
        return '超能力先生共有' . count($this->skills) .' 个异能力';
    }
}

$abilitys = ['Storm' => [10, 100]];

$incredibleMan = new IncredibleMan($abilitys);

echo $incredibleMan;//查看超能力先生的能力



